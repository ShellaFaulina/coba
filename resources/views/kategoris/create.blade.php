<!DOCTYPE html>
<html id="createbody">
    @extends ('style')
    <body id="createbody">
        <x-app-layout>
            <br>
            <div id="createbox" class="container">
                <h1>Create New Menu</h1>
                <form action="{{ url('/kategoris') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="container">
                        <tbody>
                            <tr>
                                <td class="column1"><p>Name: </p></td>
                                <td class="column2"><input type="text" name="title" required></td>
                            </tr>
                            <tr>
                                <td class="column1"><p>Description: </p></td>
                                <td class="column2"><textarea name="description" id="" cols="30" rows="10" required></textarea></td>
                            </tr>
                            <tr>
                                <td class="column1"><p>Image: </p></td>
                                <td class="column2"><input type="file" name="image" id="image" required onchange="updateFileName()"></td>
                            </tr>
                            <tr>
                                <td class="column1"></td>
                                <td class="column2"><button id="searchbtn" class="btn btn-outline-success" type="submit">Submit</button></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </form>
            </div>
        </x-app-layout>
    </body>
    <script>
        function updateFileName() {
            var fileInput = document.getElementById('image');

            if (fileInput.files.length > 0) {
                var fileName = fileInput.files[0].name;
                var validExtensions = ['png', 'svg', 'jpeg', 'jpg'];

                var extension = fileName.split('.').pop().toLowerCase();

                if (validExtensions.includes(extension)) {
                    
                } else {
                    alert('Please choose a valid image file (png, svg, jpeg, jpg).');
                    fileInput.value = ''; // Clear the file input
                }
            }
        }
    </script>
</html>

