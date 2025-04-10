$('#tbl_log').DataTable();
var role = $('#tblrole').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": window.location.origin + "/fetch-role",
        "type": "GET",
        "dataSrc": function (json) {
            // Handle the data if needed
            return json.data;
        },
        "error": function (xhr, error, code) {
            console.error("AJAX Error: " + error);
            alert("Error occurred while loading data.");
        }
    },
    "searching": true,
    "columns": [
    {
        "data": "role"
    },
    {
        "data": "points"
    },
    {
        "data": "setting"
    },
    {
        "data": "posting"
    },
    {
        "data": "users"
    },
    {
        "data": "tracking"
    },
    {
        "data": "action"
    }
    ]
});

var office = $('#tblinstitution').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": window.location.origin + "/fetch-office",
        "type": "GET",
        "dataSrc": function (json) {
            // Handle the data if needed
            return json.data;
        },
        "error": function (xhr, error, code) {
            console.error("AJAX Error: " + error);
            alert("Error occurred while loading data.");
        }
    },
    "searching": true,
    "columns": [
    {
        "data": "office"
    },
    {
        "data": "code"
    },
    {
        "data": "date"
    },
    {
        "data": "action"
    }
    ]
});