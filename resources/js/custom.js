/* IMPORTS */
//js
import 'bootstrap';
import DataTable from 'datatables.net-bs5';

//css
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-icons/font/bootstrap-icons.css';
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css';

/* GLOBAL */

//Config DataTable pour tableaux de gestion admin
let table = new DataTable('.dataTable', {
        language: {
        url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json'
    },
    "scrollX": true,
    columnDefs: [
        { orderable: false, targets: 0 }
      ],
      order: [[1, 'asc']]
});
