const video = document.querySelector(".video");
const cameraButton = document.querySelector(".camera-button");
const canvas = document.querySelector(".canvas");

navigator.mediaDevices.getUserMedia({ video: true })
  .then(stream => {
    video.srcObject = stream;
    video.play();
  })
  .catch(error => {
    console.error("Error accessing the camera:", error);
  });

cameraButton.addEventListener("click", () => {
  canvas.getContext("2d").drawImage(video, 0, 0, canvas.width, canvas.height);

  // Convert canvas to data URL
  const image_data_url = canvas.toDataURL("image/jpeg");

  // Download the image directly
  const downloadLink = document.createElement("a");
  downloadLink.href = image_data_url;
  downloadLink.download = "Employee Photo";
  document.body.appendChild(downloadLink);
  downloadLink.click();
  document.body.removeChild(downloadLink);
});
