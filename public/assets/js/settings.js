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

var courses = $('#tblcourses').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": window.location.origin + "/fetch-courses",
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
        "data": "course"
    },
    {
        "data": "code"
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
        "data": "action"
    }
    ]
});

let app = $('#tblapplication').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": window.location.origin + "/fetch-app",
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
        "data": "title"
    },
    {
        "data": "code"
    },
    {
        "data": "action"
    }
    ]
});

let type_office = $('#tbl_type').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": window.location.origin + "/fetch-types",
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
        "data": "title"
    },
    {
        "data": "code"
    },
    {
        "data": "action"
    }
    ]
});