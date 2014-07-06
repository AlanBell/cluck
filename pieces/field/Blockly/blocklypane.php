<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript" src="blockly/blockly_compressed.js"></script>
    <script type="text/javascript" src="blockly/blocks_compressed.js"></script>
    <script type="text/javascript" src="blocks.js"></script>
    <script type="text/javascript" src="blockly/msg/js/en.js"></script>
    <style>
      html, body {
        background-color: #fff;
        margin: 0;
        padding: 0;
        overflow: hidden;
        height: 100%;
      }
      .blocklySvg {
        height: 100%;
        width: 100%;
      }
    </style>
    <script>
      function init() {
        Blockly.inject(document.body,
            {path: 'blockly/', toolbox: document.getElementById('toolbox')});
        // Let the top-level application know that Blockly is ready.
        window.parent.blocklyLoaded(Blockly);
      }
    </script>
  </head>
  <body onload="init()">
    <xml id="toolbox" >
      <category name="design">
        <block type="panel"></block>
        <block type="calendar"></block>
        <block type="form"></block>
        <block type="field"></block>
        <block type="query"></block>
        <block type="table"></block>
        <block type="iterate"></block>
        <block type="menu"></block>
        <block type="menu item"></block>
      </category>
      <category name="general">
        <block type="math_number"></block>
        <block type="text"></block>
        <block type="static_text"></block>
        <block type="lists_create_with"></block>
      </category>
    </xml>
  </body>
</html>
