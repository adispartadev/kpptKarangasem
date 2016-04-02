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
$route['default_controller'] = 'front_master';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['/'] = 'front_master/index';
$route['login'] = 'front_master/login';
$route['logout'] = 'front_master/logout';
$route['register'] = 'front_master/register';
$route['login/submit'] = 'front_master/login_action';

$route['pengaturan-akun'] = 'front_master/pengaturan_akun';

$route['frontoffice'] = 'frontoffice/master_c/index';
$route['frontoffice/permohonan-ijin/ijin-baru'] = 'frontoffice/permohonan_c/redirect'; //submit syarat dan permohonan
$route['frontoffice/permohonan-ijin/ijin-baru/verifikasi-berkas'] = 'frontoffice/permohonan_c/verifikasi_berkas'; //menampilkan halaman verifikasi ijin
$route['frontoffice/permohonan-ijin/daftar-syarat'] = 'ajax/daftar_syarat'; //ajax, melihat daftar syarat
$route['frontoffice/permohonan-ijin/ijin-baru/verifikasi-berkas/submit'] = 'frontoffice/permohonan_c/submit_verifikasi_berkas'; //submit syarat dan permohonan
$route['frontoffice/permohonan-ijin/ijin-baru/identitas-pemohon/(:any)'] = 'frontoffice/permohonan_c/identitas_pemohon/$1'; //menampilkan halaman identitas pemohon
$route['frontoffice/permohonan-ijin/ijin-baru/identitas-pemohon/(:any)/submit'] = 'frontoffice/permohonan_c/submit_identitas_pemohon/$1';
$route['frontoffice/permohonan-ijin/ijin-baru/data-perusahaan/(:any)'] = 'frontoffice/permohonan_c/data_perusahaan/$1';
$route['frontoffice/permohonan-ijin/ijin-baru/data-perusahaan/(:any)/submit'] = 'frontoffice/permohonan_c/submit_data_perusahaan/$1';
$route['frontoffice/permohonan-ijin/ijin-baru/disposisi/(:any)'] = 'frontoffice/permohonan_c/disposisi/$1'; 
$route['frontoffice/permohonan-ijin/ijin-baru/disposisi/(:any)/submit'] = 'frontoffice/permohonan_c/submit_disposisi/$1'; 
$route['frontoffice/permohonan-ijin/ijin-baru/summary/(:any)'] = 'frontoffice/permohonan_c/summary/$1'; 
$route['frontoffice/permohonan-ijin/cetak/(:any)'] = 'frontoffice/permohonan_c/cetak/$1'; 
$route['frontoffice/permohonan-ijin/cetak-persetujuan/(:any)'] = 'frontoffice/permohonan_c/cetak_persetujuan/$1'; 



$route['frontoffice/permohonan_ijin/ubah-data/pemohon/(:any)'] = 'frontoffice/ubah_permohonan_c/data_pemohon/$1'; 
$route['frontoffice/permohonan-ijin/ubah-data/pemohon/(:any)/submit'] = 'frontoffice/ubah_permohonan_c/submit_data_pemohon/$1'; 
$route['frontoffice/permohonan_ijin/ubah-data/perusahaan/(:any)'] = 'frontoffice/ubah_permohonan_c/data_perusahaan/$1'; 
$route['frontoffice/permohonan_ijin/ubah-data/perusahaan/(:any)/submit'] = 'frontoffice/ubah_permohonan_c/submit_data_perusahaan/$1'; 
$route['frontoffice/permohonan_ijin/ubah-data/syarat/(:any)'] = 'frontoffice/ubah_permohonan_c/data_syarat/$1'; 



$route['frontoffice/permohonan_ijin/kirim-ulang/(:any)'] = 'frontoffice/permohonan_c/resend/$1'; 



$route['frontoffice/permohonan-ijin/lihat-data'] = 'frontoffice/permohonan_c/tampil_data'; 
$route['(:any)/permohonan-ijin/ambil-data'] = 'ajax/getDataTable';
$route['frontoffice/permohonan-ijin/lihat-data/(:any)'] = 'frontoffice/permohonan_c/lihat_data/$1';

$route['kepalabagian'] = 'kepalabagian/master_c/index';
$route['kepalabagian/permohonan-ijin/lihat-data'] = 'kepalabagian/permohonan_c/tampil_data';
$route['kepalabagian/permohonan-ijin/lihat-data/(:any)'] = 'kepalabagian/permohonan_c/lihat_data/$1';
$route['kepalabagian/permohonan-ijin/validasi/(:any)/submit'] = 'kepalabagian/permohonan_c/validasi_permohonan/$1';
$route['kepalabagian/permohonan-ijin/tolak/(:any)/submit'] = 'kepalabagian/permohonan_c/tolak_permohonan/$1';

$route['kasi'] = 'kasi/master_c/index';
$route['kasi/permohonan-ijin/lihat-data'] = 'kasi/permohonan_c/tampil_data';
$route['kasi/permohonan-ijin/lihat-data/(:any)'] = 'kasi/permohonan_c/lihat_data/$1';
$route['kasi/permohonan-ijin/validasi/(:any)/submit'] = 'kasi/permohonan_c/validasi_permohonan/$1';
$route['kasi/permohonan-ijin/tolak/(:any)/submit'] = 'kasi/permohonan_c/tolak_permohonan/$1';


$route['admin'] = 'admin/master_c/index';
$route['admin/pengguna/lihat'] = 'admin/pengguna_c/index';
$route['admin/pengguna/lihat/(:num)'] = 'admin/pengguna_c/detail/$1';
$route['admin/pengguna/tambah'] = 'admin/pengguna_c/tambah';



$route['ajax/nik-autocomplete'] = 'ajax/nikAutocomplete';
$route['ajax/lihat_notif'] = 'ajax/lihat_notif';
$route['ajax/lihat_jumlah_notif'] = 'ajax/lihat_jumlah_notif';
$route['ajax/kbli_autocomplete'] = 'ajax/kbli_autocomplete';
$route['ajax/lihat_username'] = 'ajax/checkUserNameExists';



$route['pengaturan/akun'] = 'Front_master/pengaturan_akun';
$route['pengaturan/akun/submit'] = 'Front_master/pengaturan_akun_submit';

