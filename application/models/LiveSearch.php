<?php
class LiveSearch extends CI_Model
{
    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("tb_peminjaman");
        if ($query != '') {
            $this->db->like('no_inventory', $query);
            $this->db->or_like('nip_peminjam', $query);
            $this->db->or_like('kode_peminjaman', $query);
            $this->db->or_like('nama_peminjam', $query);
            $this->db->or_like('tanggal_pinjam', $query);
            $this->db->or_like('asal_peminjam', $query);
            $this->db->or_like('tanggal_pengembalian', $query);
            $this->db->or_like('kontak_peminjam', $query);
        }
        $this->db->where('status', '1');
        $this->db->order_by('tanggal_pinjam', 'DESC');
        return $this->db->get();
    }

    function filter_data($fromdate, $todate, $statuss)
    {
        if ($statuss == "2") {
            $sql = "SELECT tb_peminjaman.kode_peminjaman,tb_peminjaman.no_inventory, tb_peminjaman.nip_peminjam, tb_peminjaman.nama_peminjam, tb_peminjaman.tanggal_pinjam, tb_peminjaman.tanggal_pengembalian, tb_peminjaman.asal_peminjam, tb_peminjaman.status, tb_peminjaman.kontak_peminjam, tb_peminjaman.stok, tb_barang.nama_barang FROM tb_peminjaman INNER JOIN tb_barang ON tb_peminjaman.no_inventory=tb_barang.no_inventory WHERE tb_peminjaman.tanggal_pinjam BETWEEN '" . $fromdate . "' AND '" . $todate . "' ORDER by tanggal_pinjam DESC";
            return $this->db->query($sql);
        } else {
            $sql = "SELECT tb_peminjaman.kode_peminjaman,tb_peminjaman.no_inventory, tb_peminjaman.nip_peminjam, tb_peminjaman.nama_peminjam, tb_peminjaman.tanggal_pinjam, tb_peminjaman.tanggal_pengembalian, tb_peminjaman.asal_peminjam, tb_peminjaman.status, tb_peminjaman.kontak_peminjam, tb_peminjaman.stok, tb_barang.nama_barang FROM tb_peminjaman INNER JOIN tb_barang ON tb_peminjaman.no_inventory=tb_barang.no_inventory WHERE tb_peminjaman.tanggal_pinjam BETWEEN '" . $fromdate . "' AND '" . $todate . "' AND tb_peminjaman.status = '" . $statuss . "' ORDER by tanggal_pinjam DESC";
            return $this->db->query($sql);
        }
    }
}
