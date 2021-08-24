<div style="padding-top: 15%; padding-left: 40%">
    <h1 jstcache="0">
        <span jsselect="heading" jsvalues=".innerHTML:msg" jstcache="10">Check the system</span>
    </h1>
    <div id="error-information-popup-container" jstcache="0">
        <div id="error-information-popup" jstcache="0">
            <div id="error-information-popup-box" jstcache="0">
                <div id="error-information-popup-content" jstcache="0">
                    <div id="suggestions-list" style=""
                        jsdisplay="(suggestionsSummaryList &amp;&amp; suggestionsSummaryList.length)" jstcache="17">
                        <p jsvalues=".innerHTML:suggestionsSummaryListHeader" jstcache="19">Try:</p>
                        <ul jsvalues=".className:suggestionsSummaryList.length == 1 ? 'single-suggestion' : ''"
                            jstcache="20" class="">
                            <li jsselect="suggestionsSummaryList" jsvalues=".innerHTML:summary" jstcache="22"
                                jsinstance="0">Checking the network cables, modem, and router</li>
                            <li jsselect="suggestionsSummaryList" jsvalues=".innerHTML:summary" jstcache="22"
                                jsinstance="1">Reconnecting to Wi-Fi <b>OR</b> </li>
                                <li jsselect="suggestionsSummaryList" jsvalues=".innerHTML:summary" jstcache="22"
                                jsinstance="1">Check the system is working well.</li>
                        </ul>
                    </div>
                    <div class="error-code" jscontent="errorCode" jstcache="18">ERR_INTERNET_DISCONNECTED</div>
                    <p id="error-information-popup-close" jstcache="0">
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="download-links-wrapper" class="hidden" jstcache="0">
        <div id="download-link-wrapper" jstcache="0">
            <a id="download-link" class="link-button" onclick="downloadButtonClick()" jsselect="downloadButton"
                jscontent="msg" jsvalues=".disabledText:disabledMsg" jstcache="7" style="display: none;">
            </a>
        </div>
        <div id="download-link-clicked-wrapper" class="hidden" jstcache="0">
            <div id="download-link-clicked" class="link-button" jsselect="downloadButton" jscontent="disabledMsg"
                jstcache="12" style="display: none;">
            </div>
        </div>
    </div>
    <div id="save-page-for-later-button" class="hidden" jstcache="0">
        <a class="link-button" onclick="savePageLaterClick()" jsselect="savePageLater" jscontent="savePageMsg"
            jstcache="11" style="display: none;">
        </a>
    </div>
    <div id="cancel-save-page-button" class="hidden" onclick="cancelSavePageClick()" jsselect="savePageLater"
        jsvalues=".innerHTML:cancelMsg" jstcache="5" style="display: none;">
    </div>
    <div id="offline-content-list" class="list-hidden" hidden="" jstcache="0">
        <div id="offline-content-list-visibility-card" onclick="toggleOfflineContentListVisibility(true)" jstcache="0">
            <div id="offline-content-list-title" jsselect="offlineContentList" jscontent="title" jstcache="13"
                style="display: none;">
            </div>
            <div jstcache="0">
                <div id="offline-content-list-show-text" jsselect="offlineContentList" jscontent="showText"
                    jstcache="15" style="display: none;">
                </div>
                <div id="offline-content-list-hide-text" jsselect="offlineContentList" jscontent="hideText"
                    jstcache="16" style="display: none;">
                </div>
            </div>
        </div>
        <div id="offline-content-suggestions" jstcache="0"></div>
        <div id="offline-content-list-action" jstcache="0">
            <a class="link-button" onclick="launchDownloadsPage()" jsselect="offlineContentList" jscontent="actionText"
                jstcache="14" style="display: none;">
            </a>
        </div>
    </div>
</div>
