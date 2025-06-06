<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// Home
$route['default_controller'] = 'C_Home';
$route['getOrderById/(:num)'] = 'C_Home/getOrderById/$1';
$route['getDataPaketById/(:num)'] = 'C_Home/getDataPaketById/$1'; 
$route['print'] = 'C_Home/print';
// End Home

// Auth
$route['login'] = 'C_Auth';
$route['register'] = 'C_Auth/register';
$route['forgot-password'] = 'C_Auth/forgotPassword';
$route['reset-password'] = 'C_Auth/resetPassword';
$route['send-reset-password-email'] = 'C_Auth/sendResetPasswordEmail';

$route['login_act'] = 'C_Auth/loginAct';
$route['logout'] = 'C_Auth/logout';
// End Auth

// Admin
$route['admin-dashboard'] = 'C_Admin';
$route['kinerja-pegawai'] = 'C_Admin/kinerjaPegawai';
$route['komisi-kurir'] = 'C_Admin/komisiKurir';
$route['komisi-washing'] = 'C_Admin/komisiWashing';
$route['admin-membership'] = 'C_Admin/membership';
$route['admin-undang-teman'] = 'C_Admin/undangTeman';
$route['laporan-order'] = 'C_Admin/laporanOrder';
$route['laporan-membership'] = 'C_Admin/laporanMembership';
$route['laporan-pendapatan'] = 'C_Admin/laporanPendapatan';
$route['atur-paket-reguler'] = 'C_Admin/aturPaketReguler';
$route['aksiPaketReguler'] = 'C_Admin/aksiPaketReguler';
$route['hapusPaketReguler'] = 'C_Admin/hapusPaketReguler';
$route['loadKomisiKurir'] = 'C_Admin/loadKomisiKurir';  
$route['loadKomisiWashing'] = 'C_Admin/loadKomisiWashing'; 
	// Order
		$route['admin-order'] = 'C_Admin/order';
		$route['admin-reguler-order'] = 'C_Admin/regulerOrder';
		$route['admin-online-order'] = 'C_Admin/onlineOrder';
		$route['simpan-harga'] = 'C_Order/simpanHarga';
		$route['tambah-order'] = 'C_Order/tambahOrder';
		$route['edit-order'] = 'C_Order/editOrder';
		$route['hapus-order'] = 'C_Order/hapusOrder';
		$route['bayar-order'] = 'C_Order/bayarOrder';
		$route['konfirmasi-order'] = 'C_Order/konfirmasiOrder';
		$route['cancel-order'] = 'C_Order/cancelOrder';
		$route['persetujuan-refund-order'] = 'C_Order/persetujuanRefundOrder';
		$route['persetujuan-order'] = 'C_Order/persetujuanOrder';
		$route['getOrderByPelanggan/(:num)'] = 'C_Order/getOrderByPelanggan/$1';
		$route['getOrderByStatus/(:any)'] = 'C_Order/getOrderByStatus/$1';
		$route['getOrderByStatusTransaksi/(:any)/(:any)'] = 'C_Order/getOrderByStatusTransaksi/$1/$2';
		$route['getAll'] = 'C_Order/getAll';
		$route['penjemputan-order'] = 'C_Order/penjemputanOrder';
		$route['pencucian-order'] = 'C_Order/pencucianOrder';
		$route['selesai-cuci-order'] = 'C_Order/selesaiCuciOrder';
		$route['pengantaran-order'] = 'C_Order/pengantaranOrder';
		$route['selesai-pengantaran-order'] = 'C_Order/selesaiPengantaranOrder';
		$route['getOrderByTanggal/(:any)'] = 'C_Order/getOrderByTanggal/$1';
		$route['getMembershipByTanggal/(:any)'] = 'C_Order/getMembershipByTanggal/$1'; 
		$route['loadPendapatan'] = 'C_Order/loadPendapatan'; 
		$route['loadKomisiKurir/(:num)'] = 'C_Order/loadKomisiKurir/$1';  

	// End Order
	// Master Data
		$route['getData/(:any)'] = 'C_Master/get/$1';
		$route['getDataById/(:any)/(:num)'] = 'C_Master/getById/$1/$2';
		$route['insert/(:any)'] = 'C_Master/insert/$1';
		$route['update/(:any)'] = 'C_Master/update/$1';
		$route['delete/(:any)'] = 'C_Master/delete/$1';
		$route['get-users/(:any)'] = 'C_Master/getUsers/$1'; 
		$route['loadKinerjaKurir'] = 'C_Master/loadKinerjaKurir'; 
		$route['loadKinerjaWashing'] = 'C_Master/loadKinerjaWashing'; 
		$route['loadMembershipPembayaran/(:any)'] = 'C_Master/loadMembershipPembayaran/$1'; 
		$route['sudahBayarMembership'] = 'C_Master/sudahBayarMembership'; 
		$route['getAllUndangTeman'] = 'C_Master/getAllUndangTeman'; 

		$route['outlet'] = 'C_Admin/outlet';
		$route['pelanggan'] = 'C_Admin/pelanggan';
		$route['paket-laundry'] = 'C_Admin/paketLaundry';
		$route['karyawan'] = 'C_Admin/karyawan'; 
	// End Master Data

// End Admin

// Kasir
$route['kasir-dashboard'] = 'C_Kasir'; 
$route['kasir-order'] = 'C_Kasir/order'; 
$route['kasir-online-order'] = 'C_Kasir/onlineOrder'; 
$route['kasir-reguler-order'] = 'C_Kasir/regulerOrder'; 
$route['kasir-membership'] = 'C_Kasir/membership'; 
$route['lihat-jadwal/(:num)'] = 'C_Kasir/lihatJadwal/$1'; 
// End Kasir

// Kurir
$route['kurir-dashboard'] = 'C_Kurir'; 
$route['kurir-order'] = 'C_Kurir/order'; 
$route['kurir-membership'] = 'C_Kurir/membership'; 
$route['loadMembershipPembayaranKurir'] = 'C_Kurir/loadMembershipPembayaranKurir'; 
// End Kurir

// Washing
$route['washing-dashboard'] = 'C_Washing'; 
$route['washing-order'] = 'C_Washing/order'; 
// End Washing

// Pelanggan
$route['pelanggan-dashboard'] = 'C_Pelanggan'; 
$route['pelanggan-order'] = 'C_Pelanggan/order';  
$route['pelanggan-profile'] = 'C_Pelanggan/profile';  
$route['update-profile-pengguna'] = 'C_Pelanggan/updateProfile';  
$route['undang-teman'] = 'C_Pelanggan/undangTeman';  
$route['pesan-membership'] = 'C_Pelanggan/pesanMembership';  
$route['getMembership'] = 'C_Pelanggan/getMembership';  
$route['getMembershipById/(:any)'] = 'C_Master/getMembershipById/$1';  
$route['getUndangTeman/(:any)'] = 'C_Pelanggan/getUndangTeman/$1';  
$route['masuk-kode'] = 'C_Pelanggan/masukKode';  
$route['ambil-kupon/(:num)'] = 'C_Pelanggan/ambilKupon/$1';  
$route['getKupon/(:num)'] = 'C_Pelanggan/getKupon/$1';  
// End Pelanggan

// Pembayaran
$route['get-my-snap'] = 'C_Payment/getSnap';
$route['get-status/(:num)'] = 'C_Payment/getStatus/$1';
$route['payment-action'] = 'C_Payment/paymentAction';
$route['ubahStatusPembayaran/(:num)'] = 'C_Payment/ubahStatusPembayaran/$1';
$route['batalkan-pesanan'] = 'C_Payment/batalkanPesanan';
$route['nonaktifkan-membership/(:num)'] = 'C_Payment/nonaktifkanMembership/$1';
// End Pembayaran


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
