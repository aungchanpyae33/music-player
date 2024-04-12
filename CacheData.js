async function cacheDatabaseData(name, data) {
  const DeleteTime = 5 * 60000;
  try {
    const Cache = await caches.open("data-array");
    const Data = JSON.stringify(data);
    const OutData = new Response(Data);
    await Cache.put(name, OutData);
    console.log("cached");
  } catch (error) {
    console.log("not success");
  }
  setTimeout(async () => {
    const OpenCache = await caches.open("data-array");
    await OpenCache.delete(name);
    console.log("data delete");
  }, DeleteTime);
}
export default cacheDatabaseData;
