# Camera Capture Application

## Overview

This project is a simple web-based application that allows users to capture a photo using their device's camera, preview it, and upload the captured photo to the server for further processing.

## Features

- **Live Camera Preview**: Accesses the user's camera and displays the video feed in real-time.
- **Capture Photo**: Allows users to capture a frame from the camera feed, which is then displayed as a still image.
- **Photo Upload**: Users can upload the captured photo to the server by submitting the form.

## Files

- `index.html`: The main file that provides the camera interface, allows photo capture, and provides the form for uploading the captured image.
- `view_photos.php`: A link to another page (not provided here) where users can view previously uploaded photos.
- `upload.php`: The server-side script that handles the uploaded image (not included here).

## Usage

1. **Access Camera**: The application accesses the user's camera through `navigator.mediaDevices.getUserMedia` API. The video feed is displayed in a `<video>` element.
   
2. **Capture Photo**: When the "Capture Photo" button is clicked, the current frame of the video feed is drawn on a `<canvas>` element. The captured image is displayed in an `<img>` tag.

3. **Upload Photo**: After capturing a photo, the user can upload the image by clicking the "Upload Photo" button, which submits the form containing the captured image.

## How It Works

### HTML Structure

- **Video Element**: Displays the camera feed (`<video id="video" autoplay></video>`).
- **Canvas Element**: Hidden by default, used to capture and process the video frame into an image (`<canvas id="canvas"></canvas>`).
- **Image Element**: Shows the captured photo once it's processed (`<img id="photo" alt="Captured Photo" style="display:none;" />`).
- **Form**: Includes a hidden file input and a submit button for uploading the captured photo to the server.

### JavaScript

- **Camera Access**: 
    ```js
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => { video.srcObject = stream; })
        .catch(error => { console.error('Error accessing camera: ', error); });
    ```
  This part requests access to the user's camera and streams the video to the `<video>` element.

- **Capture Functionality**:
    When the "Capture Photo" button is clicked, the video frame is drawn onto the `<canvas>` and converted to a PNG image:
    ```js
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    photo.src = canvas.toDataURL('image/png');
    ```
  
- **Preparing File for Upload**:
    After capturing, the image is transformed into a file, which is then added to the hidden file input for upload:
    ```js
    canvas.toBlob(blob => {
        const file = new File([blob], 'photo.png', { type: 'image/png' });
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        hiddenFileInput.files = dataTransfer.files;
    });
    ```

### Form Submission

- The form is submitted when the user clicks "Upload Photo." If no photo is captured, an alert is triggered, preventing the submission.

## Requirements

- Modern web browser with support for `getUserMedia`.
- PHP server to handle the file upload (via `upload.php`).

## Future Improvements

- Add error handling for scenarios where the camera is inaccessible or unsupported.
- Provide feedback for successful or failed uploads.
- Implement the `view_photos.php` page to display uploaded photos.
