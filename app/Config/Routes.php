<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/', 'User::change_password');
$routes->get('sekolah', 'SekolahController::index');
$routes->post('get_sekolah', 'SekolahController::get_data_sekolah');
$routes->post('save-sekolah', 'SekolahController::save_data');
$routes->post('edit-sekolah', 'SekolahController::edit');
$routes->post('update-sekolah', 'SekolahController::update');
$routes->post('get_tahun', 'SekolahController::get_tahun');

// siswa
$routes->get('siswa', 'SiswaController::index');
$routes->post('get_siswa', 'SiswaController::get_data_siswa');
$routes->post('create_siswa', 'SiswaController::create_siswa');
$routes->post('save_siswa', 'SiswaController::save_data_siswa');
$routes->post('edit_siswa', 'SiswaController::edit_data_siswa');
$routes->post('update_siswa', 'SiswaController::update_data_siswa');
$routes->post('delete-siswa', 'SiswaController::delete_siswa');
$routes->get('cetak-data-siswa', 'SiswaController::cetak_siswa');

// kelas
$routes->get('kelas', 'KelasController::index');
$routes->post('data-kelas', 'KelasController::get_data_kelas');
$routes->post('save_kelas', 'KelasController::store');
$routes->post('edit_kelas', 'KelasController::edit');
$routes->post('update_kelas', 'KelasController::update');
$routes->post('delete-kelas', 'KelasController::destroy');

// guru
$routes->get('guru', 'GuruController::index');
$routes->post('data-guru', 'GuruController::get_data_guru');
$routes->post('get-pelajaran', 'GuruController::get_pelajaran');
$routes->post('save_guru', 'GuruController::store');
$routes->post('edit_guru', 'GuruController::edit');
$routes->post('update_guru', 'GuruController::update');
$routes->post('delete-guru', 'GuruController::destroy');
$routes->post('get-userid', 'GuruController::get_userId');

// walikelas
$routes->get('wali-kelas', 'WalikelasController::index');
$routes->post('data-wali-kelas', 'WalikelasController::get_data_walas');
$routes->post('create_walas', 'WalikelasController::create');
$routes->post('save_walas', 'WalikelasController::store');
$routes->post('edit_walas', 'WalikelasController::edit');
$routes->post('update_walas', 'WalikelasController::update');
$routes->post('delete-walas', 'WalikelasController::destroy');

// pelajaran
$routes->get('pelajaran', 'PelajaranController::index');
$routes->post('data-mapel', 'PelajaranController::get_data_mapel');
$routes->post('save_mapel', 'PelajaranController::store');
$routes->post('edit_mapel', 'PelajaranController::edit');
$routes->post('update_mapel', 'PelajaranController::update');
$routes->post('delete_mapel', 'PelajaranController::destroy');
// capaian pembelajaran 
$routes->get('capaian-mapel/(:any)', 'PelajaranController::capaian_pembelajaran/$1');
$routes->post('capaian-mapel/data-capaian-mapel', 'PelajaranController::get_capaian_pembelajaran');
$routes->post('capaian-mapel/edit-capaian', 'PelajaranController::edit_capaian_pembelajaran');
$routes->post('capaian-mapel/save_capaian', 'PelajaranController::store_capaian_pembelajaran');
$routes->post('capaian-mapel/update_capaian', 'PelajaranController::update_capaian_pembelajaran');
$routes->post('capaian-mapel/delete_capaian', 'PelajaranController::destroy_capaian_pembelajaran');
// tujuan pembelajaran
$routes->get('tujuan-mapel', 'PelajaranController::tujuan_pembelajaran');
$routes->post('data-tujuan-mapel', 'PelajaranController::get_tujuan_pembelajaran');
$routes->post('save_tujuan', 'PelajaranController::store_tujuan_pembelajaran');
$routes->post('edit-tujuan', 'PelajaranController::edit_tujuan_pembelajaran');
$routes->post('update_tujuan', 'PelajaranController::update_tujuan_pembelajaran');
$routes->post('delete_tujuan', 'PelajaranController::delete_tujuan_pembelajaran');


// pindah kelas
$routes->get('pindah-kelas', 'PindahKelasController::index');
$routes->post('data-pindah-kelas', 'PindahKelasController::get_data_pindah_kelas');
// titik mangsa
$routes->get('titi-mangsa', 'TitiMangsaController::index');
$routes->post('data-titi-mangsa', 'TitiMangsaController::get_data_titi_mangsa');
$routes->post('create-titi-mangsa', 'TitiMangsaController::create');
$routes->post('save-titi-mangsa', 'TitiMangsaController::store');
$routes->post('edit-titi-mangsa', 'TitiMangsaController::edit');
$routes->post('update-titi-mangsa', 'TitiMangsaController::update');
$routes->post('delete-titi-mangsa', 'TitiMangsaController::destroy');

// ekstarkulikuler
$routes->get('get-ekskul','EkskulController::index');
$routes->post('data-ekskul','EkskulController::get_data_ekskul');
$routes->post('save-ekskul','EkskulController::store');
$routes->post('edit-ekskul','EkskulController::edit');
$routes->post('update-ekskul','EkskulController::update');
$routes->post('delete-ekskul','EkskulController::destroy');

//  nilai ekskul
$routes->get('get-nilai-ekskul','NilaiEkskulController::index');
$routes->post('data-nilai-ekskul','NilaiEkskulController::get_data_nilai_ekskul');

// beban mengajar
$routes->get('get-beban-mengajar','BebanMengajarController::index');
$routes->post('data-beban-mengajar','BebanMengajarController::get_data_beban');
$routes->post('create-beban-mengajar','BebanMengajarController::create');
$routes->post('save-beban-mengajar','BebanMengajarController::store');
$routes->post('edit-beban-mengajar','BebanMengajarController::edit');
$routes->post('update-beban-mengajar','BebanMengajarController::update');
$routes->post('delete-beban-mengajar','BebanMengajarController::destroy');

// setting Auth 
$routes->post('ubah-password','UserController::change_password');
// group access
$routes->get('group-access','GroupAccessController::index');
$routes->post('data-group-access','GroupAccessController::get_data');
$routes->post('save_grou_access','GroupAccessController::store');
$routes->post('edit-group-access','GroupAccessController::edit');
$routes->post('update-group-access','GroupAccessController::update');
$routes->post('delete-group-access','GroupAccessController::destroy');
// permission
$routes->get('permission','AuthPermissionController::index');
$routes->post('data-permission','AuthPermissionController::get_data');
$routes->post('save-permission','AuthPermissionController::store');
$routes->post('edit-permission','AuthPermissionController::edit');
$routes->post('update-permission','AuthPermissionController::update');
$routes->post('delete-permission','AuthPermissionController::destroy');
$routes->post('data-permission-edit','AuthPermissionController::get_group_permission');
// Auth user group
$routes->get('group-user','UserGroupController::index');
$routes->post('data-group-user','UserGroupController::get_data');
$routes->post('get_user_bySekolah','UserGroupController::get_data_guru');
$routes->post('save-group-user','UserGroupController::store');
$routes->post('edit-group-user','UserGroupController::edit');
$routes->post('update-group-user','UserGroupController::update');
$routes->post('delete-group-user','UserGroupController::destroy');

// user
$routes->get('user','UserController::index');
$routes->post('get-user','UserController::get_user');
$routes->post('delete-user','UserController::destroy');

// Rapor
$routes->get('rapor','RaporController::index');
$routes->post('get-data-rapor','RaporController::get_data_rapor');
$routes->get('cover','RaporController::get_data_kelas');
$routes->get('identitas','RaporController::get_data_kelas');


