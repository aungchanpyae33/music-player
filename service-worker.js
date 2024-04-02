async function cacheAudioFile(url, name) {
  const deleteTime = 3 * 600000;
  try {
    const cache = await caches.open("audio-cache");
    const response = await fetch(url);
    await cache.put(name, response.clone());
    console.log("Audio file cached successfully");
  } catch (error) {
    console.error("Failed to cache audio file:", error);
  }
  setTimeout(async () => {
    const cache = await caches.open("audio-cache");
    await cache.delete(name);
    console.log("Expired audio file deleted");
  }, deleteTime);
}
export default cacheAudioFile;
