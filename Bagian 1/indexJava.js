document.addEventListener('DOMContentLoaded', function () {
    
    document.getElementById('dataForm').addEventListener('submit', function (event) {
      event.preventDefault(); 
  
      if (validateForm()) {
        processData();
      }
    });
  
    document.getElementById('status').addEventListener('change', function () {
      alert('Status Vaksinasi Mahasiswa terpilih');
    });

  
    function validateForm() {
      var name = document.getElementById('name').value;
      var nim = document.getElementById('nim').value;
  
      if (name === '' || nim === '') {
        alert('Nama dan NIM harus diisi');
        return false;
      }
  
      return true;
    }
  
    function processData() {
      var name = document.getElementById('name').value;
      var nim = document.getElementById('nim').value;
      var gender = document.querySelector('input[name="gender"]:checked').value;
      var status = document.getElementById('status').checked ? 'Sudah' : 'Belum';
  
      var newRow = document.createElement('tr');
  
      newRow.innerHTML = `
        <td>${name}</td>
        <td>${nim}</td>
        <td>${gender}</td>
        <td>${status}</td>
      `;
  
      document.getElementById('dataTable').getElementsByTagName('tbody')[0].appendChild(newRow);
  
      document.getElementById('dataForm').reset();
    }
});
  