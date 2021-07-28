<div class='top-menu-dashboard'>
  <div class="profileb" onclick='dashboard()'>
    <button class="btn btn-default btn-lg">
      <span class="glyphicon glyphicon-th" aria-hidden="true"></span> داشبورد
    </button>
  </div>
  <div class="shdlistb" onclick='shdlist()'>
    <button class="btn btn-default btn-lg">
      <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> لیست دانلود
    </button>
  </div>
  <div class="buyb" onclick='buy()'>
    <button class="btn btn-default btn-lg">
      <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> خرید فضا
    </button>
  </div>

  <div class="signoutb" onclick='logout()'>
    <button class="btn btn-default btn-lg">
      <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> خروج
    </button>

  </div>
</div>
<center>
<div class='workbody'>
  <form class='downloadform'>
<label for="basic-url">آدرس ویدیوی مورد نظر شما</label>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon3">http://</span>
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">

</div>
</br>
<button class='btn btn-lg btn-primary' onclick='download()' id='downloadb'>

دانلود <span class="glyphicon glyphicon-download-alt" aria-hidden="true" ></span>
</button>
</form>
</div>
