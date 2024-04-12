async function getCacheArray(name) {
  try {
    const Cache = await caches.open("data-array");

    const checkArray = await Cache.match(name);

    if (checkArray) {
      const cacheResponse = await checkArray.text();
      const cacheArrayData = JSON.parse(cacheResponse);

      return cacheArrayData;
    } else {
      console.log("not exit");
      return null;
    }
  } catch (error) {
    console.log("fail to open cache");
    return null;
  }
}
export default getCacheArray;
