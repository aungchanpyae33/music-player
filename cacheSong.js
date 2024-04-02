const audioCacheName = "audio-cache";

async function playCachedAudioFile(cachedResponse, element) {
  try {
    console.log(cachedResponse);
    if (cachedResponse) {
      const blob = await cachedResponse.blob();
      const objectURL = URL.createObjectURL(blob);
      element.src = objectURL;
      element.play();
    } else {
    }
  } catch (error) {}
}
export default playCachedAudioFile;
