<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


.sidenav {
  height: 100%;
  width: 300px;
 
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}



</style>
</head>
<body>
 <div class="sidenav">
                <a href="#">Add Students <i class ="fa fa-user"></i></a>
                <ul>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            Module<i class ="fa fa-plane"></i></a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="#">Assessments</a>
                            </li>
                            <li>
                                <a href="#"><i class ="fa fa-hand-o-right"></i>Grades</a>
                            </li>
                           <li>
                                <a href="#"><i class ="fa fa-hand-o-right"></i>Summertive Feedback</a>
                            </li>
                            <li>
                                <a href="#"><i class ="fa fa-hand-o-right"></i>Formative Feedback</a>
                            </li>
                             <li>
                                <a href="#"><i class ="fa fa-hand-o-right"></i>Weightage</a>
                            </li>
                           
                        </ul>
                        
                    </li>
                     <li>
                           <a href="#">Preset Feedback<i class="fa fa-sticky-note-o" aria-hidden="true"></i></a>
                     </li>
                </ul>
               
               
 </div>

