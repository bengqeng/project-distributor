require('./bootstrap');
import 'bootstrap';

import daterangepicker from 'daterangepicker';
window.daterangepicker = daterangepicker;

import moment from 'moment';
window.moment = moment;

import Swal from 'sweetalert2';
window.Swal = Swal;

import mediumZoom from 'medium-zoom';
window.mediumZoom = mediumZoom;

import '@fortawesome/fontawesome-free';
import simplelightbox from 'simplelightbox';

window.JSZip = require('jszip');
require('datatables.net-bs4');
require('datatables.net-buttons-bs4');
require('datatables.net-buttons/js/buttons.colVis.js');
require('datatables.net-buttons/js/buttons.html5.js');
require('datatables.net-buttons/js/buttons.print.js');
require('datatables.net-searchbuilder-bs4');
require('pdfmake');
require('selectize');
require('chart.js/dist/chart');
require('summernote/dist/summernote-bs4');
require('flot/dist/es5/jquery.flot');
require('flot/source/jquery.flot.pie');
require('flot/source/jquery.flot.resize');
require('masonry-layout/masonry.js');
require('simplelightbox/dist/simple-lightbox');
require('luminous-lightbox/dist/Luminous.js');
require('jquery-mask-plugin');
