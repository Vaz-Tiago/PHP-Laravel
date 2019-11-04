<div class="container-menu">
<ul class="collapsible" id="ulMenu">
   <li id="mLaravel">
      <div class="collapsible-header red darken-4 white-text"><i class="material-icons">filter_drama</i>Laravel</div>
      <div class="collapsible-body">
            <a href="{{route('laravel.models')}}" class="btn-flat">
               Models | Migrations
            </a>
            <br>
            <a href="#" class="btn-flat">Teste</a>
      </div>
   </li>
   <li id="mAspNetCore">
      <div class="collapsible-header blue darken-4 white-text"><i class="material-icons">border_all</i>ASP.NetCore</div>
      <div class="collapsible-body">
         <a href="{{route('AspNetCore.Mvc')}}" class="btn-flat">
            MVC
         </a>
         <a href="{{route('AspNetCore.Layout')}}" class="btn-flat">
            Layout
         </a>
         <a href="{{route('AspNetCore.Login')}}" class="btn-flat">
            Login
         </a>
         <a href="{{route('AspNetCore.Session')}}" class="btn-flat">
            Session
         </a>
      </div>
   </li>
</ul>
</div>