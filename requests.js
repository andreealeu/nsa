
$(document).ready(function() {

    var ids = [];
    var add_form = $("#add-form");
    var user = "andreea"

    $.ajax({
        dataType: "json",
        type: "GET",
        url: "get_data.php",
        data: {"type": ""},
        success: display_data 
    });

    function display_data(data)
    {
        
        $("#log_reports tbody").remove();

        var rows = '';
        $.each(data, function (i, item) {
            rows += '<tr>' +
                    '<td>' + item.id + '</td>' +
                    '<td>' + item.type + '</td>' +
                    '<td>' + item.severity + '</td>' +
                    '<td>' + item.date + '</td>' +
                    '<td>' + item.message + '</td>' +
                    '<td>' + item.user + '</td>' +
                    '<td>' + '<button id="delete">-</button>' + '</td>'
                '</tr>';
            ids.push(item.id);
        });
    

        $("#log_reports").append(rows);
        


    
    $("#add-button").click(add_item);
    function add_item(){

        var add_type = $("#add-type");
        var add_severity = $("#add-severity");
        var add_date = $("#add-date");
        var add_message = $("#add-message");

    
        var log_data = {
            "type": add_type.val(),
            "severity": add_severity.val(),
            "date": add_date.val(),
            "message": add_message.val(),
        };
        
        console.log(add_message.val());
        console.log(add_message);
        console.log(log_data);

        $.ajax({
            dataType: "json",
            type: "POST",
            url: "post_log.php",
            data: log_data,
            succes: function(data){
                alert("i sent the data")
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);  
            }
        });

        location.reload();


        $("#delete").click(delete_item);
        function delete_item(event)
        {
            var log = {
                "id": event.data.id
            };
     
            $.ajax({
                dataType: "json",
                type: "POST",
                url: "delete_log.php",
                data: log
            });
     
            location.reload();
        }
}
}
});