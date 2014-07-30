Blockly.Blocks['vtigerfield'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(270);
    this.appendDummyInput()
        .appendField('Field');
    this.appendDummyInput()
        .appendField('name')
        .appendField(new Blockly.FieldTextInput(""), "name");
    this.appendDummyInput()
        .appendField('label')
        .appendField(new Blockly.FieldTextInput(""), "label");
    this.appendDummyInput()
        .appendField('column')
        .appendField(new Blockly.FieldTextInput(""), "column");
    this.appendDummyInput()
        .appendField('columntype')
        .appendField(new Blockly.FieldTextInput("VARCHAR(100)"), "columntype");
    this.appendDummyInput()
        .appendField('uitype')
        .appendField(new Blockly.FieldTextInput("1"), "uitype");
    this.appendDummyInput()
        .appendField('quickcreate')
        .appendField(new Blockly.FieldTextInput("0"), "quickcreate");
    this.appendDummyInput()
        .appendField('typeofdata')
        .appendField(new Blockly.FieldTextInput("V~O"), "typeofdata");
    this.appendDummyInput()
        .appendField('masseditable')
        .appendField(new Blockly.FieldTextInput("0"), "masseditable");

    this.setInputsInline(false);

    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};


