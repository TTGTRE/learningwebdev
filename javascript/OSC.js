/**
 * Short-hand for <code>document.getElementById(string)</code>
 * @param id
 * @returns {HTMLElement}
 * @constructor
 */
function O(id) {
    return typeof(id) == "object" ? id : document.getElementById(id);
}

/**
 * Gets the style associated with the element with an ID of <code>id</code>
 * @param id
 * @returns {CSSStyleDeclaration | string}
 * @constructor
 */
function S(id) {
    return id.style;
}

/**
 * Gets all elements with the class name <code>id</code>
 * @param id
 * @returns {HTMLCollectionOf<Element>}
 * @constructor
 */
function C(id) {
    return document.getElementsByClassName(id);
}