Blockly.Blocks['panel'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Panel");
    this.appendValueInput("title")
        .appendField("Title");
    this.appendStatementInput("body")
        .appendField("Body");
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

Blockly.Blocks['form'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Form");
    this.appendStatementInput("content")
        .appendField("Fields");
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

Blockly.Blocks['menu item'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Menu item");
    this.appendValueInput("title")
        .appendField("Title");
    this.appendValueInput("action")
        .appendField("Action");
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

Blockly.Blocks['menu'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Menu");
    this.appendStatementInput("menu");
    this.setTooltip('');
  }
};


Blockly.Blocks['table'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Table");
    this.appendValueInput("collection")
        .appendField("Collection");
    this.appendValueInput("find")
        .appendField("Find");
    this.appendValueInput("sort")
        .appendField("Sort");
    this.appendStatementInput("content")
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

Blockly.Blocks['iterate'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Iterate");
    this.appendValueInput("collection")
        .appendField("Collection");
    this.appendValueInput("find")
        .appendField("Find Query");
    this.appendValueInput("sort")
        .appendField("Sort");
    this.appendValueInput("direction")
        .appendField("Direction");
    this.appendValueInput("limit")
        .appendField("Limit");
    this.appendStatementInput("content");
    this.setTooltip('');
    this.setPreviousStatement(true);
    this.setNextStatement(true);

  }
};

Blockly.Blocks['field'] = {
  init: function() {
    this.setColour(75);
    this.appendDummyInput()
        .appendField("Field");
    this.appendValueInput("name")
        .appendField("Name");
    this.appendValueInput("type")
        .appendField("Type");
    this.appendValueInput("title")
        .appendField("Title");
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

Blockly.Blocks['cell_reference'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(330);
    this.appendValueInput("Column")
        .setCheck("String")
        .appendField("");
    this.appendValueInput("Row");
    this.setInputsInline(true);
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

Blockly.Blocks['column_offset'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(330);
    this.appendValueInput("offset")
        .setCheck("Number")
        .appendField("C+");
    this.setInputsInline(true);
    this.setOutput(true, "String");
    this.setTooltip('');
  }
};

Blockly.Blocks['row_offset'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(330);
    this.appendValueInput("offset")
        .setCheck("Number")
        .appendField("R+");
    this.setInputsInline(true);
    this.setOutput(true, "String");
    this.setTooltip('');
  }
};

Blockly.Blocks['test'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(330);
    this.appendDummyInput()
        .appendField(new Blockly.FieldCheckbox("TRUE"), "nullok")
        .appendField("Allow blanks");
    this.appendValueInput("sheet")
        .appendField("Sheet");
    this.appendValueInput("range")
        .appendField("Range");
    this.appendValueInput("expected")
        .appendField("Expected");
    this.setTooltip('');
  }
};

Blockly.Blocks['expectation'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(330);
    this.appendStatementInput("formula")
        .appendField("Formula")
    this.setOutput(true);
    this.setTooltip('');
  }
};

Blockly.Blocks['rippledown'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(330);
    this.appendDummyInput()
        .appendField("Ripple Down");

    this.setOutput(true);
    this.setTooltip('');
  }
};

Blockly.Blocks['static_text'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(330);
    this.appendDummyInput()
        .appendField(new Blockly.FieldTextInput("="), "static");
    this.setInputsInline(true);
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

Blockly.Blocks['external'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(285);
    this.appendDummyInput()
        .appendField("External");
    this.appendValueInput("class")
        .appendField("Class");
    this.appendValueInput("require")
        .appendField("Require");
    this.appendValueInput("instance")
        .appendField("Instance");
    this.appendValueInput("method")
        .appendField("Method");
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};
