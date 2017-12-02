<?php $this->load->view('header'); ?>

  <button id="start">Start</button>

  <div class="row">

    <div id="column1" class="medium-6 large-6 columns">
      <div class="block">
        Block Left
      </div>
    </div>

    <div id="column2" class="medium-6 large-6 columns">
      <div class="block">
        Block Right
      </div>
    </div>

  </div>


  <div id="block" class="block">
    <div data-alert class="alert-box radius">
      This is a success alert with a radius.
      <a href="#" class="close">&times;</a>
    </div>

    <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!">extended information</span>

    <a href="#"><i class="fi-trash"></i></a>      

  </div>

  <!-- At the bottom of your page but inside of the body tag -->
  <ol class="joyride-list" data-joyride>
    <li data-id="column1" data-text="Next" data-options="tip_location: top; prev_button: false">
      <p>Hello and welcome to the Joyride <br>documentation page.</p>
    </li>
    <li data-id="column2" data-class="custom so-awesome" data-text="Next" data-prev-text="Prev">
      <h4>Stop #1</h4>
      <p>You can control all the details for you tour stop. Any valid HTML will work inside of Joyride.</p>
    </li>
    <li data-id="block" data-button="Next" data-prev-text="Prev" data-options="tip_location:top;tip_animation:fade">
      <h4>Stop #2</h4>
      <p>Get the details right by styling Joyride with a custom stylesheet!</p>
    </li>
    <li data-button="End" data-prev-text="Prev">
      <h4>Stop #3</h4>
      <p>It works as a modal too!</p>
    </li>
  </ol>

<?php $this->load->view('footer'); ?>