<?php //>

const APP_DATA = APP_HOME . 'data/';
const APP_LOG = APP_HOME . 'logs/';

const DB_NAME = 'pgsql:dbname=toa_db';
const DB_USER = 'toa';
const DB_PASSWORD = null;

const PACKAGES = ['matrix-platform/backend-adminlte'];

session_name('rpi-admin');
session_start();
