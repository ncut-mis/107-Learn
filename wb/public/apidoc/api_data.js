define({ "api": [
  {
    "type": "get",
    "url": "/api/drawToWhiteboard",
    "title": "Draw on the Whiteboard",
    "description": "<p>Function draw on whiteboard with different tools and more...</p>",
    "name": "drawToWhiteboard",
    "group": "WhiteboardAPI",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "wid",
            "description": "<p>WhiteboardId you find in the Whiteboard URL</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "at",
            "description": "<p>Accesstoken (Only if activated for this server)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "t",
            "description": "<p>The tool you want to use:  &quot;line&quot;, &quot;pen&quot;, &quot;rect&quot;, &quot;circle&quot;, &quot;eraser&quot;, &quot;addImgBG&quot;, &quot;recSelect&quot;, &quot;eraseRec&quot;, &quot;addTextBox&quot;, &quot;setTextboxText&quot;, &quot;removeTextbox&quot;, &quot;setTextboxPosition&quot;, &quot;setTextboxFontSize&quot;, &quot;setTextboxFontColor&quot;,</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "username",
            "description": "<p>The username performing this action. Only relevant for the undo/redo function</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "draw",
            "description": "<p>Only has a function if t is set to &quot;addImgBG&quot;. Set 1 to draw on canvas; 0  to draw into background</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "url",
            "description": "<p>Only has a function if t is set to &quot;addImgBG&quot;, then it has to be set to: [rootUrl]/uploads/[ReadOnlyWid]/[ReadOnlyWid]_[date].png</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "c",
            "description": "<p>Color: Only used if color is needed (pen, rect, circle, addTextBox ... )</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "th",
            "description": "<p>Thickness: Only used if Thickness is needed (pen, rect ... )</p>"
          },
          {
            "group": "Parameter",
            "type": "Number[]",
            "optional": false,
            "field": "d",
            "description": "<p>has different function on every tool you use: pen: [width, height, left, top, rotation]</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "body",
            "description": "<p>returns the &quot;done&quot; as text</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "Number",
            "optional": false,
            "field": "401",
            "description": "<p>Unauthorized</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "scripts/server-backend.js",
    "groupTitle": "WhiteboardAPI"
  },
  {
    "type": "get",
    "url": "/api/getReadOnlyWid",
    "title": "Get the readOnlyWhiteboardId",
    "description": "<p>This returns the readOnlyWhiteboardId for a given WhiteboardId</p>",
    "name": "getReadOnlyWid",
    "group": "WhiteboardAPI",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "wid",
            "description": "<p>WhiteboardId you find in the Whiteboard URL</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "at",
            "description": "<p>Accesstoken (Only if activated for this server)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "body",
            "description": "<p>returns the readOnlyWhiteboardId as text</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "Number",
            "optional": false,
            "field": "401",
            "description": "<p>Unauthorized</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Example usage:",
        "content": "curl -i http://[rootUrl]/api/getReadOnlyWid?wid=[MyWhiteboardId]",
        "type": "curl"
      }
    ],
    "version": "0.0.0",
    "filename": "scripts/server-backend.js",
    "groupTitle": "WhiteboardAPI"
  },
  {
    "type": "get",
    "url": "/api/loadwhiteboard",
    "title": "Get Whiteboard Data",
    "description": "<p>This returns all the Available Data ever drawn to this Whiteboard</p>",
    "name": "loadwhiteboard",
    "group": "WhiteboardAPI",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "wid",
            "description": "<p>WhiteboardId you find in the Whiteboard URL</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "at",
            "description": "<p>Accesstoken (Only if activated for this server)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "body",
            "description": "<p>returns the data as JSON String</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "Number",
            "optional": false,
            "field": "401",
            "description": "<p>Unauthorized</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Example usage:",
        "content": "curl -i http://[rootUrl]/api/loadwhiteboard?wid=[MyWhiteboardId]",
        "type": "curl"
      }
    ],
    "version": "0.0.0",
    "filename": "scripts/server-backend.js",
    "groupTitle": "WhiteboardAPI"
  },
  {
    "type": "post",
    "url": "/api/upload",
    "title": "Upload Images",
    "description": "<p>Upload Image to the server. Note that you need to add the image to the board after upload by calling &quot;drawToWhiteboard&quot; with addImgBG set as tool</p>",
    "name": "upload",
    "group": "WhiteboardAPI",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "wid",
            "description": "<p>WhiteboardId you find in the Whiteboard URL</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "at",
            "description": "<p>Accesstoken (Only if activated for this server)</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "current",
            "description": "<p>timestamp</p>"
          },
          {
            "group": "Parameter",
            "type": "Boolean",
            "optional": false,
            "field": "webdavaccess",
            "description": "<p>set true to upload to webdav (Optional; Only if activated for this server)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "imagedata",
            "description": "<p>The imagedata base64 encoded</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "body",
            "description": "<p>returns &quot;done&quot;</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "Number",
            "optional": false,
            "field": "401",
            "description": "<p>Unauthorized</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "scripts/server-backend.js",
    "groupTitle": "WhiteboardAPI"
  }
] });
