        <i class="fa fa-globe fa-lg" style="color:blue" id="click" aria-hidden="true" title="Notifications!">
          @php
          $notifications = Auth::user()->unreadnotifications
        @endphp
        <sup style="color: black">{{  count($notifications) }} </sup></i>
        