<html>
<body>
    <table>
        <tr>
            <th>School Name</th>
            <th>City</th>
            <th>State</th>
            <th>Mascot</th>
        </tr>
        <?php
            require 'services/schoolFileParsingService.php';
            $fileInputName = 'schoolsFile';

            if ($_FILES[$fileInputName]['error'] > 0){
                throw new Exception("Errors happened trying to upload your file.");
            }
            else{
                $file = $_FILES[$fileInputName];
                $tmpName = $file['tmp_name'];

                if (empty($tmpName)) throw new Exception("Temp filename was not found.");

                $fileService = new SchoolFileParsingService($tmpName);
                $schools = $fileService->getObjects();

                foreach ($schools as $school) {
                    print "<tr>";
                        print "<td> $school->Name </td>";
                        print "<td> $school->City </td>";
                        print "<td> $school->State </td>";
                        print "<td> $school->Mascot </td>";
                    print "</tr>";
                }
            }
        ?>
    </table>
</body>
</html>