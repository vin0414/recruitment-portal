let educations = $('#educations').DataTable(
    {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": window.location.origin + "/fetch-education-data",
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
        "columns": [{
            "data": "level"
        },
        {
            "data": "from"
        },
        {
            "data": "to"
        },
        {
            "data": "action"
        }
        ]
    }
);
let trainings = $('#trainings').DataTable(
    {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": window.location.origin + "/fetch-training-data",
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
        "columns": [{
            "data": "level"
        },
        {
            "data": "from"
        },
        {
            "data": "to"
        },
        {
            "data": "action"
        }
        ]
    }
);
let experience = $('#experiences').DataTable(
    {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": window.location.origin + "/fetch-experience-data",
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
        "columns": [{
            "data": "level"
        },
        {
            "data": "from"
        },
        {
            "data": "to"
        },
        {
            "data": "action"
        }
        ]
    }
);