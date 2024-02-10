/*
 * (c) 2020: 975L <contact@975l.com>
 * (c) 2020: Laurent Marquet <laurent.marquet@laposte.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

// Opens the share popup
function sharePopup(url) {
    let width = (screen.width * 50) / 100;
    let height = (screen.height * 40) / 100;
    let left = (screen.width - width) / 2;
    let top = (screen.height - height) / 2;
    window.open(url, "Share", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=" + width + ", height=" + height + ", top=" + top + ", left=" + left);
}
