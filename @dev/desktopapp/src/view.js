const electron = require("electron");
const { webContents, BrowserView } = electron; // https://www.electronjs.org/docs/api/browser-view

exports.createBrowserView = (mainWindow) => {
  const view = new BrowserView();
  mainWindow.setBrowserView(view);
  view.setBounds({ x: 0, y: 0, width: 1450, height: 950 });
  view.webContents.loadURL("https://myseo.website");
};
