.rave .stat-full:after {
   content: "";
   position: absolute;
   background-color: <?php echo $accent ?>;
   height: 6px;
   width: 180px;
   bottom: 0;
   left: calc(50% - 90px);
}

@media (max-width: 768px){
   .rave .stat-full:after{
      width: 100px;
      left: calc(50% - 50px);
   }
}