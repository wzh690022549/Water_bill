<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'Water_bill');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}


function add($date, $event, $money, $remark)
{
    $sql = "insert into `data` (date, event, money, remark, status) values ($date, $event, $money, $remark, 1)";
    if ($GLOBALS['mysqli']->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error:" . $sql . "<br>" . $GLOBALS['mysqli']->error;
    }
}


function select_all()
{
    $sql = "select * from `data` where `status` = 1";
    $res = $GLOBALS['mysqli']->query($sql);
    if ($res->num_rows > 0) {
        $i = 1;
        while ($row = $res->fetch_assoc()) {
            echo "id:" . $i . " date:" . $row["date"] . " event:" . $row["event"] . " money:" . $row["money"] . " remark:" . $row["remark"]."<br>";
            $i++;
        }
    } else {
        echo "No result.";
    }
}


function update($id, $date, $event, $money, $remark)
{
    $sql = "update `data` set `date` = $date , `event` = $event, `money` = $money, `remark` = $remark where `id` = $id";
    if ($GLOBALS['mysqli']->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error:" . $sql . "<br>" . $GLOBALS['mysqli']->error;
    }
}


function delete($id){
    $sql = "update `data` set `status` = 0 where `id` = $id";
    if ($GLOBALS['mysqli']->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error:" . $sql . "<br>" . $GLOBALS['mysqli']->error;
    }
}
select_all();
