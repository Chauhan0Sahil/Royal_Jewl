<?php
    $cn=mysqli_connect("localhost","root","","project");
   /* $qry="CREATE DATABASE demo";
    if(mysqli_query($cn,$qry))
        echo"Database created successfully..";
    else
        echo "Error".mysqli_error($cn);
*/
/*
    $qry="Create table user (id int primary key auto_increment , unm varchar(10),pw varchar(10),email varchar(20),phno varchar(10),gen varchar(10),city varchar(20))";
    if(mysqli_query($cn,$qry))
    echo"Table created successfully..";
else
    echo "Error".mysqli_error();
    */
    /*
    $qry="create table feedback (id int primary key auto_increment,nm varchar(20),email varchar(20),msg varchar(100))";
    if(mysqli_query($cn,$qry))
        echo"Table created successfully..";
    else
        echo "Error".mysqli_error();
    */
    /*
    $qry="create table questions (id int primary key auto_increment,nm varchar(20),email varchar(20),msg varchar(100))";
    if(mysqli_query($cn,$qry))
        echo"Table created successfully..";
    else
        echo "Error".mysqli_error();
    */

     /*
    $qry="create table products (id int primary key auto_increment,nm varchar(20),price int)";
    if(mysqli_query($cn,$qry))
        echo"Table created successfully..";
    else
        echo "Error".mysqli_error();

        */

        /*   $qry="insert into products (nm,price) 
                values('DOUBLE LAYERED RING',2999),
                ('SQUARED DIAMOND RING',3999),
                ('BUTTERFLY EARRINGS',6999),
                ('NECKLACE',5499),
                ('COUPLE RINGS',5999),
                ('HEART EARRING',4999),
                ('DIAMOND NECKLACE',7999),
                ('ROYAL RING',4499)";
    if(mysqli_query($cn,$qry)){
        echo "Done";
    }*/
     /* 
    $qry="create table purchase (id int primary key auto_increment,unm varchar(20),phno varchar(20),pid int,quantity int,address varchar(100),payment_type varchar(20),cardno varchar(20),cvv int,total varchar(20))";
    if (mysqli_query($cn,$qry)){
        echo "heyy";
    }*/

?>