<?php
class Mahasiswa{
    
    public $nim;
    public $nama;
    public $jenis_kelamin;
    public $tempat_lahir;
    public $tanggal_lahir;    
    public $alamat;
    private $kon;
    private $tabel = "tbl_mahasiswa";
      
    public function __construct($dbname){
        $this->kon = $dbname;
    }
    //Get Semua data Mahasiswa
    function get_mhs()
    {
        $query = "SELECT * FROM " . $this->tabel . "";        
        $stmt = $this->kon->prepare($query);        
        $stmt->execute();
        return $stmt;
    }
    //fungsi get mahasiswa by nim
    function get_byNim()
    {
        $query = "SELECT * FROM " . $this->tabel . " m          
                WHERE
                    m.nim = ?
                LIMIT
                0,1";
        $stmt = $this->kon->prepare($query);
        $stmt->bindParam(1, $this->nim);
        
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // memasukkan nilai ke object      
        $this->nama = $row['nama'];
        $this->tempat_lahir = $row['tempat_lahir'];
        $this->jenis_kelamin = $row['jenis_kelamin'];
        $this->tanggal_lahir = $row['tanggal_lahir'];
        $this->alamat = $row['alamat'];
    }
    
}
?>