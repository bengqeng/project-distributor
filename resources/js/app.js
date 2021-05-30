require('./bootstrap');

require('datatables.net-dt');
require('selectize');
require('inputmask/dist/inputmask');

import daterangepicker from 'daterangepicker';
window.daterangepicker = daterangepicker;

import moment from 'moment';
window.moment = moment;

import '@fortawesome/fontawesome-free';

require('chart.js/dist/chart');
require('summernote/dist/summernote');
require('flot/dist/es5/jquery.flot');

import knob from 'knob';
window.knob = knob;

import Swal from 'sweetalert2/src/sweetalert2.js';
window.Swal = Swal;