<?php
session_start();
// ��� ��������� �������� �� �������. ������ � ��� �������� ������ ������������, ���� �� ��������� �� �����. ����� ����� ��������� �� � ����� ������ ���������!!!

if (isset($_POST['login'])) { $login = $_POST['login'];if ($login == '') { unset($login);} } //������� ��������� ������������� ����� � ���������� $login, ���� �� ������, �� ���������� ����������
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }//������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������

if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
{
exit ("�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!");
}
//���� ����� � ������ �������,�� ������������ ��, ����� ���� � ������� �� ��������, ���� �� ��� ���� ����� ������
$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//������� ������ �������
$login = trim($login);
$password = trim($password);


// ���������� �����********************************************

// ������������ � ����
include '../inc/config.php';
include '../inc/db.php';// ���� bd.php ������ ���� � ��� �� �����, ��� � ��� ���������, ���� ��� �� ���, �� ������ �������� ���� 

// ������������ �� ������ �������
$ip=getenv("HTTP_X_FORWARDED_FOR");
if (empty($ip) || $ip=='unknown') { $ip=getenv("REMOTE_ADDR"); }

mysqli_query($db, "DELETE FROM mistake WHERE UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 900");//������� ip-������ ����������� ��� ����� ������������� ����� 15 �����.

$result = mysqli_query("SELECT col FROM mistake WHERE ip='$ip'");// ��������� �� ���� ����������� ��������� ������� ����� �� ��������� 15 ����� � ������������ � ������ ip
$myrow = mysqli_fetch_array($result);

if ($myrow['col'] > 2) {
//���� ������� ������� ������ ����, �� ������ ���������.
    exit("�� ������� ����� ��� ������ ������� 3 ����. ��������� 15 ����� �� ��������� �������.");
}


$password = md5($password);//������� ������
$password = strrev($password);// ��� ���������� ������� ������
$password = $password."b3p6f";
//����� �������� ��������� ����� �������� �� �����, ��������, ������ "b3p6f". ���� ���� ������ ����� ���������� ������� ������� � ���� �� ������� ���� �� md5,�� ���� ������ �������� �� ������. �� ������� ������� ������ �������, ����� � ������ ������ ��� � ��������.
//��� ���� ���������� ��������� ����� ���� password � ����. ������������� ������ ����� ��������� ������� �������� �������.
$result = mysqli_query($db, "SELECT * FROM users WHERE login='$login' AND password='$password'"); //��������� �� ���� ��� ������ � ������������ � ��������� �������
$myrow = mysqli_fetch_array($result);
if (empty($myrow['id'])){//���� ������������ � ��������� ������� � ������� �� ����������,�� ���������� ip ������������ � � ����� ������
    $select = mysqli_query($db, "SELECT ip FROM mistake WHERE ip='$ip'");
    $tmp = mysqli_fetch_row($select);
    if ($ip == $tmp[0]) {//���������, ���� �� ������������ � ������� "mistake"
        $result52 = mysqli_query($db, "SELECT col FROM mistake WHERE ip='$ip'");
        $myrow52 = mysqli_fetch_array($result52);
        $col = $myrow52[0] + 1;//���� ����,�� �������������� ��������� 
        mysqli_query ("UPDATE mistake SET col=$col,date=NOW() WHERE ip='$ip'");
    } else {//���� �� ��������� 15 ����� ������ �� ����, �� ��������� ����� ������ � ������� "mistake"
        mysqli_query("INSERT INTO mistake (ip,date,col) VALUES ('$ip',NOW(),'1')");
    }
    exit ("��������, �������� ���� ����� ��� ������ ��������.");
} else {
    //���� ������ ���������, �� ��������� ������������ ������! ������ ��� ����������, �� �����!
    $_SESSION['password']=$myrow['password']; 
	$_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];//��� ������ ����� ����� ������������, ��� �� � ����� "������ � �����" �������� ������������
    //����� �� ���������� ������ � ����, ��� ������������ �����.
    //��������!!! ������� ��� �� ���� ����������, ��� ��� ������ �������� � ����� ��� ��������
    if (isset($_POST['save'])){
        //���� ������������ �����, ����� ��� ������ ����������� ��� ������������ �����, �� ��������� � ����� ��� ��������
        setcookie("login", $_POST["login"], time()+9999999);
        setcookie("password", $_POST["password"], time()+9999999);
    }
    echo "�� �����.";
}	
echo "<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>";
//�������������� ������������ �� ������� ���������, ��� ��� � ������� �� ������� �����

?>
