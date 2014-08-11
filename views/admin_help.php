<?php $pd = new Parsedown(); ?>
<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Help</h1>
    <p>Tips and Tricks to help you get the most from your website</p>
  </div>

  <div class="row">

    <div class="col-sm-12">

      <h2>Markdown</h2>

      <p>Markdown is the syntax used when formatting your content. It allows you to make things bold, underline words or add links.</p>
      <p>Below are some simple examples of Markdown, and how to use them.</p>
      <p>For a full breakdown of everything that is available, check out <a href="http://daringfireball.net/projects/markdown/syntax" target="_blank">this website</a></p>

      <p>All inputs that are compatible with Markdown are highlighted with this icon: <i class="glyphicon glyphicon-pencil"> </i></p>

    </div>

    <div class="col-sm-12">

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Example</th>
            <th>Result</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Paragraph (just a blank line between text)</td>
            <td>this is the first line<br /><br />this is the second line</td>
            <td><?php echo $pd->text("this is the first line\n\nthis is the second line");?></td>
          </tr>
          <tr>
            <td>Header</td>
            <td># Header</td>
            <td><?php echo $pd->text("# Header");?></td>
          </tr>
          <tr>
            <td>Sub-Header</td>
            <td>## Header<br /><br /><br /><br />You can go all the way down to ###### Header</td>
            <td><?php echo $pd->text("## Header");?><br /><?php echo $pd->text("###### Header");?></td>
          </tr>          
          <tr>
            <td>Bold text</td>
            <td>**make this text bold**</td>
            <td><?php echo $pd->text("**make this text bold**");?></td>
          </tr>
          <tr>
            <td>Italic/emphasis on text</td>
            <td>_emphasis_</td>
            <td><?php echo $pd->text("_emphasis_");?></td>
          </tr>
          <tr>
            <td>Block quote</td>
            <td>&gt; Some important words</td>
            <td><?php echo $pd->text("> Some important words");?></td>
          </tr>
          <tr>
            <td>Add a link</td>
            <td>[This link](http://example.net/)</td>
            <td><?php echo $pd->text("[This link](http://example.net/)");?></td>
          </tr>
          <tr>
            <td>Bullet List</td>
            <td>* item one<br />* item two<br />* item three</td>
            <td><?php echo $pd->text("* item one\n* item two\n* item three");?></td>
          </tr>
          <tr>
            <td>Numbered List</td>
            <td>1. item one<br />2. item two<br />3. item three</td>
            <td><?php echo $pd->text("1. item one\n2. item two\n3. item three");?></td>
          </tr>
          <tr>
            <td>Image</td>
            <td>![Troy Lake PT](http://<?php echo $_SERVER['HTTP_HOST'];?>/img/troy-headshot.jpg)</td>
            <td><?php echo $pd->text("![Alt text](http://".$_SERVER['HTTP_HOST']."/img/troy-headshot.jpg)");?></td>
          </tr>
        </tbody>
      </table>

    </div>

  </div>