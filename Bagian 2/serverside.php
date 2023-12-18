<?php
include 'indexconection.php';

class FormData {
    private $name;
    private $nim;
    private $gender;
    private $status;

    public function __construct($name, $nim, $status, $gender) {
        $this->name = $name;
        $this->nim = $nim;
        $this->gender = $gender;
        $this->status = $status;
    }

    public function displayInfo() {
        echo '<tr>';
        echo '<td>' . $this->name . '</td>';
        echo '<td>' . $this->nim . '</td>';
        echo '<td>' . $this->gender . '</td>';
        echo '<td>' . $this->status . '</td>';
        echo '</tr>';
    }

    public function saveToDatabase() {
        global $conn;

        $sql = "INSERT INTO FormData (name, nim, gender, status) VALUES ('$this->name', $this->nim, '$this->status', '$this->gender')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan ke database.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

function displayFormData() {
    global $conn;

    // Simulasi database
    $formEntries = [];

    // Cek apakah formulir telah dikirim
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $nim = $_POST['nim'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $status = isset($_POST['status']) ? 'Sudah' : 'Belum';

        $formEntries[] = new FormData($name, $nim, $gender, $status);

        end($formEntries)->saveToDatabase();
    }
    foreach ($formEntries as $entry) {
        $entry->displayInfo();
    }
}
?>