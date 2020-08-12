<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }


    public function index()
    {
        $this->load->view('admin/loginadmin.php');
        $this->loginadmin();
    }
    public function dash()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $sql = "SELECT tb_peminjaman.no_inventory, tb_peminjaman.nama_peminjam, tb_peminjaman.asal_peminjam, tb_peminjaman.tanggal_pengembalian, tb_peminjaman.tanggal_pinjam, tb_peminjaman.status, tb_peminjaman.kode_peminjaman, tb_peminjaman.stok, tb_barang.nama_barang FROM tb_barang INNER JOIN tb_peminjaman ON tb_peminjaman.no_inventory=tb_barang.no_inventory WHERE tb_peminjaman.status = '1' ORDER BY tb_peminjaman.tanggal_pinjam DESC
            ";

            $data['total_barang'] = $this->db->get('tb_barang')->num_rows();
            $data['total_peminjaman'] = $this->db->get('tb_peminjaman')->num_rows();
            $data['total_pengembalian'] = $this->db->get('tb_pengembalian')->num_rows();
            $data['total_user'] = $this->db->get('user')->num_rows();
            $data['num_row'] = $this->db->query($sql)->num_rows();
            $data['barang'] = $this->db->get('tb_peminjaman')->result_array();
            $this->load->view('template/header.php', $data);
            $this->load->view('admin/admin-index.php', $data);
            $this->load->view('template/footer.php');
        }
    }

    private function loginadmin()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        $passFromDb = $user['password'];
        $hash = password_hash($passFromDb, PASSWORD_DEFAULT);
        if ($user) {  //jika user ada
            if (password_verify($pass, $hash)) {
                $data = [
                    'username' => $user['username']
                ];
                $this->session->set_userdata($data);
                redirect('dashboard/dash');
            } else {
                $this->session->set_flashdata('m', '<small class="warning-text text-danger form_name">Password salah!</small><br>');
            }
        } else {
            $this->session->set_flashdata('m', '<small class="warning-text text-danger form_name">Username tidak ditemukan!</small><br>');
        }
    }

    public function datapeminjaman()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $sql = "SELECT tb_peminjaman.no_inventory, tb_peminjaman.nip_peminjam, tb_peminjaman.kontak_peminjam, tb_peminjaman.nama_peminjam, tb_peminjaman.asal_peminjam, tb_peminjaman.tanggal_pengembalian, tb_peminjaman.tanggal_pinjam, tb_peminjaman.status, tb_peminjaman.kode_peminjaman, tb_peminjaman.stok, tb_barang.nama_barang FROM tb_barang INNER JOIN tb_peminjaman ON tb_peminjaman.no_inventory=tb_barang.no_inventory WHERE tb_peminjaman.status = '1' ORDER BY tb_peminjaman.tanggal_pinjam DESC
            ";
            $data['num_row'] = $this->db->query($sql)->num_rows();
            $data['data_peminjaman'] = $this->db->query($sql)->result_array();
            $data['data_barang'] = $this->db->get('tb_barang')->result_array();
            $this->load->view('template/header.php', $data);
            $this->load->view('admin/data-peminjaman.php', $data);
            $this->load->view('template/footer.php');
        }
    }
    public function cetakpeminjaman()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $sql = "SELECT tb_peminjaman.no_inventory, tb_peminjaman.nip_peminjam, tb_peminjaman.kontak_peminjam, tb_peminjaman.nama_peminjam, tb_peminjaman.asal_peminjam, tb_peminjaman.tanggal_pengembalian, tb_peminjaman.tanggal_pinjam, tb_peminjaman.status, tb_peminjaman.kode_peminjaman, tb_peminjaman.stok, tb_barang.nama_barang FROM tb_barang INNER JOIN tb_peminjaman ON tb_peminjaman.no_inventory=tb_barang.no_inventory WHERE tb_peminjaman.status = '1' ORDER BY tb_peminjaman.tanggal_pinjam DESC
            ";
            $data['num_row'] = $this->db->query($sql)->num_rows();
            $data['data_peminjaman'] = $this->db->query($sql)->result_array();
            $data['data_barang'] = $this->db->get('tb_barang')->result_array();
            $this->load->view('template/header.php', $data);
            $this->load->view('admin/cetak-peminjaman.php', $data);
            $this->load->view('template/footer.php');
        }
    }
    public function databarang()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $sql = "SELECT tb_peminjaman.no_inventory, tb_peminjaman.nama_peminjam, tb_peminjaman.asal_peminjam, tb_peminjaman.tanggal_pengembalian, tb_peminjaman.tanggal_pinjam, tb_peminjaman.status, tb_peminjaman.kode_peminjaman, tb_peminjaman.stok, tb_barang.nama_barang FROM tb_barang INNER JOIN tb_peminjaman ON tb_peminjaman.no_inventory=tb_barang.no_inventory WHERE tb_peminjaman.status = '1' ORDER BY tb_peminjaman.tanggal_pinjam DESC
            ";
            $data['num_row'] = $this->db->query($sql)->num_rows();
            $data['data_barang'] = $this->db->order_by('date_created', 'DESC')->get('tb_barang')->result_array();
            $this->load->view('template/header.php', $data);
            $this->load->view('admin/data-barang.php', $data);
            $this->load->view('template/footer.php');
        }
    }
    public function datapengembalian()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $sql = "SELECT tb_peminjaman.no_inventory, tb_peminjaman.nama_peminjam, tb_peminjaman.asal_peminjam, tb_peminjaman.tanggal_pengembalian, tb_peminjaman.tanggal_pinjam, tb_peminjaman.status, tb_peminjaman.kode_peminjaman, tb_peminjaman.stok, tb_barang.nama_barang FROM tb_barang INNER JOIN tb_peminjaman ON tb_peminjaman.no_inventory=tb_barang.no_inventory WHERE tb_peminjaman.status = '1' ORDER BY tb_peminjaman.tanggal_pinjam DESC
            ";
            $data['num_row'] = $this->db->query($sql)->num_rows();
            $data['data_pengembalian'] = $this->db->order_by('date_created', 'DESC')->get('tb_pengembalian')->result_array();
            $this->load->view('template/header.php', $data);
            $this->load->view('admin/list-pengembalian.php', $data);
            $this->load->view('template/footer.php');
        }
    }

    public function pengembalian()
    {
        $sql = "SELECT tb_peminjaman.no_inventory, tb_peminjaman.nama_peminjam, tb_peminjaman.asal_peminjam, tb_peminjaman.tanggal_pengembalian, tb_peminjaman.tanggal_pinjam, tb_peminjaman.status, tb_peminjaman.kode_peminjaman, tb_peminjaman.stok, tb_barang.nama_barang FROM tb_barang INNER JOIN tb_peminjaman ON tb_peminjaman.no_inventory=tb_barang.no_inventory WHERE tb_peminjaman.status = '1' ORDER BY tb_peminjaman.tanggal_pinjam DESC
            ";
        $data['num_row'] = $this->db->query($sql)->num_rows();
        $data['id'] = $this->uri->segment(3);
        $data['idbrg'] = $this->uri->segment(4);
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/pengembalian.php', $data);
        $this->load->view('template/footer.php');
    }

    public function add_pengembalian()
    {
        $kode = $this->input->post('kode_peminjaman');
        $no = $this->input->post('no_inventory');
        $nama = $this->input->post('nama');
        $kontak = $this->input->post('kontak');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');
        $penerima = $this->input->post('penerima');

        $this->db->set('kode_peminjaman', $kode);
        $this->db->set('no_inventory', $no);
        $this->db->set('memberi', $nama);
        $this->db->set('kontak', $kontak);
        $this->db->set('stok', $jumlah);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('penerima', $penerima);
        $this->db->set('date_created', date('yy-m-d H:i:s'));
        $this->db->insert('tb_pengembalian');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('messageSuccess', '<div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
                </div>');
            //redirect('dashboard/datapeminjaman');
            redirect('dashboard/pengembalian/' . $kode . '/' . $no);
        } else {
            $this->session->set_flashdata('messageFailed', '<div class="alert alert-success" role="alert">
                Data gagal ditambahkan
                </div>');
            redirect('dashboard/' . $kode . '/' . $no);
        }
    }

    public function tambahadmin()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $sql = "SELECT tb_peminjaman.no_inventory, tb_peminjaman.nama_peminjam, tb_peminjaman.asal_peminjam, tb_peminjaman.tanggal_pengembalian, tb_peminjaman.tanggal_pinjam, tb_peminjaman.status, tb_peminjaman.kode_peminjaman, tb_peminjaman.stok, tb_barang.nama_barang FROM tb_barang INNER JOIN tb_peminjaman ON tb_peminjaman.no_inventory=tb_barang.no_inventory WHERE tb_peminjaman.status = '1' ORDER BY tb_peminjaman.tanggal_pinjam DESC
            ";
            $data['num_row'] = $this->db->query($sql)->num_rows();
            $this->load->view('template/header.php', $data);
            $this->load->view('admin/tambah-admin.php');
            $this->load->view('template/footer.php');
        }
    }
    public function ubahpassword()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $sql = "SELECT tb_peminjaman.no_inventory, tb_peminjaman.nama_peminjam, tb_peminjaman.asal_peminjam, tb_peminjaman.tanggal_pengembalian, tb_peminjaman.tanggal_pinjam, tb_peminjaman.status, tb_peminjaman.kode_peminjaman, tb_peminjaman.stok, tb_barang.nama_barang FROM tb_barang INNER JOIN tb_peminjaman ON tb_peminjaman.no_inventory=tb_barang.no_inventory WHERE tb_peminjaman.status = '1' ORDER BY tb_peminjaman.tanggal_pinjam DESC
            ";
            $data['num_row'] = $this->db->query($sql)->num_rows();
            $this->load->view('template/header.php', $data);
            $this->load->view('admin/gantipassword.php');
            $this->load->view('template/footer.php');
        }
    }
    public function deletebarang()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $id = $this->uri->segment(3);
            $this->db->delete('tb_barang', ['no_inventory' => $id]);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('messageDelete', '<div class="alert alert-success" role="alert">
                Data berhasil dihapus
                </div>');
                redirect('dashboard/databarang');
            } else {
                $this->session->set_flashdata('messageDelete', '<div class="alert alert-danger" role="alert">
                Data gagal dihapus
                </div>');
                redirect('dashboard/databarang');
            }
        }
    }

    public function deletepeminjaman()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $id = $this->uri->segment(3);
            $this->db->delete('tb_peminjaman', ['kode_peminjaman' => $id]);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('messageDelete', '<div class="alert alert-success" role="alert">
                Data berhasil dihapus
                </div>');
                redirect('dashboard/datapeminjaman');
            } else {
                $this->session->set_flashdata('messageDelete', '<div class="alert alert-danger" role="alert">
                Data gagal dihapus
                </div>');
                redirect('dashboard/datapeminjaman');
            }
        }
    }

    public function addbarang()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $nama = $this->input->post('nama_barang');
            $kategori = $this->input->post('kategori');
            $stok = $this->input->post('stok');
            $img = $_FILES['foto']['name'];
            $jenis = $this->input->post('jenis');
            $date = $this->input->post('date');
            $create_inventori = strtolower($kategori) . date('dmyyhis');

            if ($img) {
                # code...
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = 'asset/img/barang';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    echo $this->upload->display_errors();
                } else {
                    array('upload_data' => $this->upload->data());
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('no_inventory', $create_inventori);
                    $this->db->set('nama_barang', $nama);
                    $this->db->set('stok', $stok);
                    $this->db->set('kategori', $kategori);
                    $this->db->set('jenis_barang', $jenis);
                    $this->db->set('tanggal_pengadaan', $date);
                    $this->db->set('foto_barang', $new_img);
                    $this->db->set('date_created', date('yy-m-d H:i:s'));
                    $this->db->insert('tb_barang');
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('messageIn', '<div class="alert alert-success" role="alert">
                        Data berhasil ditambahkan.
                    </div>');
                        redirect('dashboard/databarang');
                    }
                }
            } else {
                $this->session->set_flashdata('messageIn', '<div class="alert alert-danger" role="alert">
            Pilih foto terlebih dahulu
          </div>');
                redirect('dashboard/tambahadmin');
            }
        }
    }




    public function updatepeminjaman()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $kodepeminjaman = $this->input->post('kode_peminjaman');
            $tanggalpinjam = $this->input->post('date_pinjam');
            $tanggalkembali = $this->input->post('date_kembali');
            $jumlah = $this->input->post('jumlah');
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $kontak = $this->input->post('kontak');
            $asal = $this->input->post('asal');
            $nama_barang = $this->input->post('nama_barang');
            date_default_timezone_set('Asia/Jakarta');
            $currentdate = date('yy-m-d H:i:s');


            $this->db->set('nip_peminjam', $nip);
            $this->db->set('nama_peminjam', $nama);
            $this->db->set('kontak_peminjam', $kontak);
            $this->db->set('asal_peminjam', $asal);
            $this->db->set('no_inventory', $nama_barang);
            $this->db->set('tanggal_pinjam', $tanggalpinjam);
            $this->db->set('tanggal_pengembalian', $tanggalkembali);
            $this->db->set('updated_at', $currentdate);
            $this->db->set('stok', $jumlah);
            $this->db->where('kode_peminjaman', $kodepeminjaman);
            $this->db->update('tb_peminjaman');
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('messageIn', '<div class="alert alert-success" role="alert">
                Data berhasil diupdate.
            </div>');
                redirect('dashboard/datapeminjaman');
            }
        }
    }
    public function addpeminjaman()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $jumlah = $this->input->post('jumlah');
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $kontak = $this->input->post('kontak');
            $asal = $this->input->post('asal');
            $nama_barang = $this->input->post('nama_barang');
            $date = $this->input->post('date');
            date_default_timezone_set('Asia/Jakarta');
            $currentdate = date('yy-m-d H:i:s');
            $create_kode = trim(date('dmyyhis'));
            //var_dump($currentdate);die;
            $rand = rand(1000, 10000);
            $kode = $create_kode;


            $this->db->set('nip_peminjam', $nip);
            $this->db->set('nama_peminjam', $nama);
            $this->db->set('kontak_peminjam', $kontak);
            $this->db->set('asal_peminjam', $asal);
            $this->db->set('no_inventory', $nama_barang);
            $this->db->set('tanggal_pinjam', $currentdate);
            $this->db->set('tanggal_pengembalian', $date);
            $this->db->set('kode_peminjaman', $kode);
            $this->db->set('stok', $jumlah);
            $this->db->set('status', 1);
            $this->db->insert('tb_peminjaman');
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('messageIn', '<div class="alert alert-success" role="alert">
                Data berhasil ditambahkan.
            </div>');
                redirect('dashboard/datapeminjaman');
            }
        }
    }

    public function update_databarang()
    {
        if (!$this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $noinventori = $this->input->post('inventori');
            $nama = $this->input->post('nama_barang');
            $kategori = $this->input->post('kategori');
            $jenis = $this->input->post('jenis');
            $date = $this->input->post('date');
            $stok = $this->input->post('stok');
            $this->db->set('nama_barang', $nama);
            $this->db->set('stok', $stok);
            $this->db->set('kategori', $kategori);
            $this->db->set('jenis_barang', $jenis);
            $this->db->set('tanggal_pengadaan', $date);
            $this->db->where('no_inventory', $noinventori);
            $this->db->update('tb_barang');

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('messageIn', '<div class="alert alert-success" role="alert">
                Data berhasil diubah.
            </div>');
                redirect('dashboard/databarang');
            } else {
                $this->session->set_flashdata('messageIn', '<div class="alert alert-danger" role="alert">
                Data gagal diubah.
            </div>');
                redirect('dashboard/databarang');
            }
        }
    }
    public function update_fotobarang()
    {
        $id = $this->input->post('inventori');
        $img = $_FILES['foto']['name'];

        if ($img) {
            # code...
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = 'asset/img/barang';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                echo $this->upload->display_errors();
            } else {
                array('upload_data' => $this->upload->data());
                $new_img = $this->upload->data('file_name');
                $this->db->set('foto_barang', $new_img);
                $this->db->where('no_inventory', $id);
                $this->db->update('tb_barang');
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('messageIn', '<div class="alert alert-success" role="alert">
                        Data berhasil diubah.
                    </div>');
                    redirect('dashboard/databarang');
                }
            }
        } else {
            $this->session->set_flashdata('messageIn', '<div class="alert alert-danger" role="alert">
            Pilih foto terlebih dahulu
            </div>');
            redirect('dashboard/databarang');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        redirect('dashboard');
    }


    // Controler Live Search
    function search()
    {
        $output = '';
        $query = '';
        $this->load->model('LiveSearch');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->LiveSearch->fetch_data($query);

        $output .= '
            <table id="peminjaman" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal Peminjaman</th>
                    <th>Nama Barang</th> 
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
            ';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                <tr>
                <td>' . $row->tanggal_pinjam . '</td>
                <td>' . $row->kode_peminjaman . '</td>
                <td>' . $row->nama_peminjam . '</td>
                <td>' . $row->tanggal_pengembalian . '</td>
                <td>' . $row->status . '</td>
                <td><a href="' . base_url() . 'dashboard/pengembalian/' . $row->kode_peminjaman . '/' . $row->no_inventory . '" class="badge badge-success">Pengembalian</a></td>
                </tr>
            ';
            }
        } else {
            $output .= '<tr>
            <td colspan="5">No Data Found</td>
            </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    function filter()
    {

        $this->load->model('LiveSearch');
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $status = $this->input->post('status');
        $data = $this->LiveSearch->filter_data($from, $to, $status);
        $output = '';
        $output .= '

        <div class="mytable">
        <table id="cetak" class="table table-bordered table-striped mt-5">
                            <thead>
                                <tr>
                                    <th>Kode Peminjaman</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Jumlah</th>
                                    <th>Nama Peminjam</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Asal Peminjam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
            ';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) :
                $output .= '
                <tr>
                <td>' . $row->kode_peminjaman . '</td>
                <td>' . $row->no_inventory . '</td>
                <td>' . $row->no_inventory . '</td>
                <td>' . $row->stok . '</td>
                <td>' . $row->nama_peminjam . '</td>
                <td>' . $row->tanggal_pinjam . '</td>
                <td>' . $row->tanggal_pengembalian . '</td>
                <td>' . $row->asal_peminjam . '</td>
                <td>' . $row->status . '</td>
                </tr>
            ';
            endforeach;
        } else {
            $output .= '<tr>
            <td colspan="8">No Datahaha Found</td>
            </tr>';
        }
        $output .= '
        </tbody></table></div>';
        echo $output;
        $this->load->view('admin/cetak.php');
    }
}
