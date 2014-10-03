<?php

/**
 * Kelas ini membuat koneksi dan melakukan peng-query-an ke database
 * 
 */
class Database
{
    /**
     * @var PDO variable penyimpan koneksi database
     * 
     */
    private static $conn;
    
    /**
     * Konstruktor
     * @access private
     */
    private function __construct()
    {
    
    }
    
    /**
     * Melakukan koneksi ke database menggunakan driver PDO
     * @access private
     * @return mixed mengembalikan instance dari kelas PDO jika berhasil, null jika gagal
     */
    private static function connect()
    {
        if(!isset(self::$conn)){
            $conf = WY_Config::get('db');
            $dsn = "mysql:host=".$conf['host'].";port=".$conf['port'].";dbname=".$conf['dbname'];
            try{
                self::$conn = new PDO($dsn, $conf['username'], $conf['password']);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            }catch(PDOException $e){
                self::disconnect();
                echo $e->getMessage();
            }
        }
        return self::$conn;
    }
    
    /**
     * Memutuskan koneksi ke database
     * 
     */
    public static function disconnect(){
        self::$conn = null;
    }
    
    /**
     * Mengeksekusi query DDL ke database
     * @param string $sql query DDL yang akan di eksekusi
     * @param array $params parameter (key=>value) untuk prepared statement
     */
    public static function execute($sql, $params = null)
    {
        try{
            $conn = self::connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
    }
    
    /**
     * Mengambil semua baris yang diminta dari database
     * @param string $sql query yang akan di jalankan
     * @param array $params parameter (key=>value) untuk prepared statement
     * @param int $fetch_style mode fetching: PDO::FETCH_ASSOC,PDO::FETCH_NUM, PDO::FETCH_OBJ dll.
     * @return array baris dari database, array kosong jika tidak ada yang ditemukan
     */
    public static function all($sql, $params = null, $fetch_style = PDO::FETCH_OBJ)
    {
        $result = null;
        try{
            $conn = self::connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetchAll($fetch_style);
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
        return $result;
    }
    
    /**
     * Mengambil satu baris yang diminta dari database
     * @param string $sql query yang akan di jalankan
     * @param array $params parameter (key=>value) untuk prepared statement
     * @param int $fetch_style mode fetching: PDO::FETCH_ASSOC,PDO::FETCH_NUM, PDO::FETCH_OBJ dll.
     * @return mixed baris dari database, false jika gagal
     */
    public static function row($sql, $params = null, $fetch_style = PDO::FETCH_OBJ)
    {
        $result = null;
        try{
            $conn = self::connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetch($fetch_style);
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
        return $result;
    }
    
    /**
     * Mengambil satu kolom yang diminta dari database
     * @param string $sql query yang akan di jalankan
     * @param array $params parameter (key=>value) untuk prepared statement
     * @return mixed tergantung tipe data kolom
     */
    public static function one($sql, $params = null)
    {
        $result = null;
        try{
            $conn = self::connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetch(PDO::FETCH_NUM);
            $result = $result[0];
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
        return $result;
    }
}