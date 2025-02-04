document.getElementById("vdbanner")?.remove();

const targetId = 'vdbanner';
// ページの内容が変化するたびに監視
const observer = new MutationObserver(() => {
    const adElement = document.getElementById(targetId);
    if (adElement) {
        adElement.remove();
        console.log(`Removed element with id: ${targetId}`);
    }
});
  // 監視の設定
    observer.observe(document.body, {
    childList: true, // 子要素の追加・削除を監視
    subtree: true    // サブツリーも監視
});