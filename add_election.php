<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Election</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        #myForm {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"], input[type="file"] {
            width: calc(100% - 20px); /* Adjust for padding */
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="button"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="button"]:hover, input[type="submit"]:hover {
            background-color: #0056b3;
        }

        #inputContainer {
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <?php 
    include('admin_main.php');
    ?>
    <?php 
        if(isset($_SESSION["admin"]))
        {
            $elename='';
            if(isset($_SESSION["ele_name"]))
            {
                $elename=$_SESSION["ele_name"];
            }
            unset($_SESSION["ele_name"]);
        ?>
    <h1>New Election <?= $elename ?></h1>
    <form id="myForm" method="post" action="election_add.php" enctype="multipart/form-data" >
        <!-- Your existing form fields -->
        <label for="ele_name">Election Name:</label>
        <input type="text" name="ele_name" id="ele_name">

        <div id="inputContainer"></div>
        
        <button type="button" onclick="addInput()">Add Party</button>
        <input type="hidden" name="count" id="cou">
        <input type="submit" value="Submit" name='sub'>
    </form>
<?php }
else{
    header("location:index.html");
}
?>
    <script>
        var pco = 1;

        function addInput() {
            var totcou = document.getElementById("cou");
            var container = document.getElementById("inputContainer");
            var label = document.createElement("label");
            label.textContent = "Party:" + pco+" Name ";
            var input = document.createElement("input");
            input.type = "text";
            var file = document.createElement("input");
            file.type = "file";
            file.name = "photo_party" + pco;
            totcou.value = pco;

            input.name = "party" + pco; // Set the name attribute

            pco += 1;
            container.appendChild(label);
            container.appendChild(input);
            container.appendChild(file);
        }
    </script>
</body>
</html>
