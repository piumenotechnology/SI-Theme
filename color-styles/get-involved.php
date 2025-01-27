.box i, .box .fa {
   color: <?php echo $accent ?>;
}

.box a:after{
   content: '';
   width: 140px;
   left: calc(50% - 70px);
   height: 3px;
   background: <?php echo $accent ?>;
   display: block;
   position: absolute;
   bottom: 0px;
}

@media (max-width: 798px){
   .box a:after{
      width: 80px;
      left: calc(50% - 40px);
   }
}