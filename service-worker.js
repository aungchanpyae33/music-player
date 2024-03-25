async function cacheAudioFile(url, name) {
  try {
    const cache = await caches.open("audio-cache");
    const response = await fetch(url);
    await cache.put(name, response.clone());
    console.log("Audio file cached successfully");
  } catch (error) {
    console.error("Failed to cache audio file:", error);
  }
}
export default cacheAudioFile;
