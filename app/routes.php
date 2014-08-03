<?php



//User routes==========================//
Route::get('new-user/{email}/{pw}/{with}', 'UserController@newUser');

Route::get('check-user/{email}/{pw}', 'UserController@checkUser');

Route::get('get-user/{userId}', 'UserController@getUser');

Route::get('plus-user/{name}/{id}/{gender}', 'UserController@plusUser');

Route::get('update-user/{id}/{title}/{name}/{email}/{birthMonth}/{birthDay}/{birthYear}', 'UserController@updateUser');

Route::get('delete-user/{userId}', 'UserController@deleteUser');

Route::get('forgot/{email}', 'UserController@forgotPassword');

Route::get('check-reset-token/{token}', 'UserController@checkResetToken');

Route::get('reset-pass/{userId}/{password}', 'UserController@resetPassword');

Route::get('settings-reset-pass/{userId}/{currentPass}/{password}', 'UserController@resetSettingsPassword');

Route::get('restore-user/{email}/{pw}', 'UserController@restoreUser');

Route::get('set-theme/{userId}/{theme}', 'UserController@setTheme');






//Devices
Route::get('device/{userId}/{name}/{currentDeviceId}', 'UserController@device');

Route::get('get-devices/{userId}', 'UserController@getDevices');

Route::get('delete-device/{deviceId}', 'UserController@deleteDevice');

Route::get('rename-device/{deviceId}/{name}', 'UserController@renameDevice');







//Search routes===========================//
Route::get('search/{searchQuery}/{userId}', 'SearchController@search');

Route::get('get-search-history/{userId}/{characters}', 'SearchController@getSearchHistory');






//Playlist routes==========================//
Route::get('new-playlist/{userId}/{songId}/{playlistName}', 'PlaylistsController@newPlaylist');

Route::get('add-shared-playlist/{userId}/{sharedPlaylistId}', 'PlaylistsController@addSharedPlaylist');

Route::get('get-playlist-songs/{playlistId}', 'PlaylistsController@getPlaylistSongs');

Route::get('get-playlists/{userId}', 'PlaylistsController@getPlaylists');

Route::get('add-to-playlist/{songId}/{playlistId}', 'PlaylistsController@addToPlaylist');

Route::get('delete-from-playlist/{songId}/{playlistId}', 'PlaylistsController@deleteFromPlaylist');

Route::get('delete-playlist/{playlistId}', 'PlaylistsController@deletePlaylist');

Route::get('rename-playlist/{playlistId}/{newName}', 'PlaylistsController@renamePlaylist');

// Route::get('share-playlist', 'PlaylistsController@sharePlaylist');





//Library routes============================//

Route::get('get-library/{id}', 'LibraryController@getLibrary');

Route::get('get-library-count/{id}', 'LibraryController@getLibraryCount');

Route::get('add-to-library/{songId}/{userId}', 'LibraryController@addToLibrary');

Route::get('remove-from-library/{songId}/{userId}', 'LibraryController@removeFromLibrary');






//Logging routes===============================//
Route::get('log-song-play/{userId}/{songId}', 'LogController@logSongPlay');

Route::get('log-shared-song/{userId}/{songId}', 'LogController@logSharedSong');

Route::get('log-shared-playlist/{userId}/{playlistId}', 'LogController@logSharedPlaylist');

Route::get('log-playlist-play/{userId}/{playlistId}', 'LogController@logPlaylistPlay');

Route::get('log-login/{userId}', 'LogController@logLogin');

Route::get('log-failed-login/{email}', 'LogController@logFailedLogin');

Route::get('log-logout/{userId}', 'LogController@logLogout');

Route::get('log-login-from-signup/{userId}', 'LogController@logLoginFromSignup');






//Dropbox routes===============================//

// Route::get('db', 'DropboxController@dbTest');











