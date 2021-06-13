"use strict";

var electron = require("electron");

var webContents = electron.webContents,
    BrowserView = electron.BrowserView; // https://www.electronjs.org/docs/api/browser-view

exports.createBrowserView = function (mainWindow) {
  var view = new BrowserView();
  mainWindow.setBrowserView(view);
  view.setBounds({
    x: 0,
    y: 0,
    width: 1450,
    height: 950
  });
  view.webContents.loadURL("https://myseo.website");
};