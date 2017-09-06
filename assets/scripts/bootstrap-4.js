/*!
 * Bootstrap v4.0.0-beta (https://getbootstrap.com)
 * Copyright 2011-2017 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

if (typeof jQuery === 'undefined') {
    throw new Error('Bootstrap\'s JavaScript requires jQuery. jQuery must be included before Bootstrap\'s JavaScript.')
}

(function ($) {
    var version = $.fn.jquery.split(' ')[0].split('.')
    if ((version[0] < 2 && version[1] < 9) || (version[0] == 1 && version[1] == 9 && version[2] < 1) || (version[0] >= 4)) {
        throw new Error('Bootstrap\'s JavaScript requires at least jQuery v1.9.1 but less than v4.0.0')
    }
})(jQuery);

(function () {
    var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

    var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

    function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

    function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

    function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): util.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Util = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Private TransitionEnd Helpers
         * ------------------------------------------------------------------------
         */

        var transition = false;

        var MAX_UID = 1000000;

        var TransitionEndEvent = {
            WebkitTransition: 'webkitTransitionEnd',
            MozTransition: 'transitionend',
            OTransition: 'oTransitionEnd otransitionend',
            transition: 'transitionend'

            // shoutout AngusCroll (https://goo.gl/pxwQGp)
        };function toType(obj) {
            return {}.toString.call(obj).match(/\s([a-zA-Z]+)/)[1].toLowerCase();
        }

        function isElement(obj) {
            return (obj[0] || obj).nodeType;
        }

        function getSpecialTransitionEndEvent() {
            return {
                bindType: transition.end,
                delegateType: transition.end,
                handle: function handle(event) {
                    if ($(event.target).is(this)) {
                        return event.handleObj.handler.apply(this, arguments); // eslint-disable-line prefer-rest-params
                    }
                    return undefined;
                }
            };
        }

        function transitionEndTest() {
            if (window.QUnit) {
                return false;
            }

            var el = document.createElement('bootstrap');

            for (var name in TransitionEndEvent) {
                if (el.style[name] !== undefined) {
                    return {
                        end: TransitionEndEvent[name]
                    };
                }
            }

            return false;
        }

        function transitionEndEmulator(duration) {
            var _this = this;

            var called = false;

            $(this).one(Util.TRANSITION_END, function () {
                called = true;
            });

            setTimeout(function () {
                if (!called) {
                    Util.triggerTransitionEnd(_this);
                }
            }, duration);

            return this;
        }

        function setTransitionEndSupport() {
            transition = transitionEndTest();

            $.fn.emulateTransitionEnd = transitionEndEmulator;

            if (Util.supportsTransitionEnd()) {
                $.event.special[Util.TRANSITION_END] = getSpecialTransitionEndEvent();
            }
        }

        /**
         * --------------------------------------------------------------------------
         * Public Util Api
         * --------------------------------------------------------------------------
         */

        var Util = {

            TRANSITION_END: 'bsTransitionEnd',

            getUID: function getUID(prefix) {
                do {
                    // eslint-disable-next-line no-bitwise
                    prefix += ~~(Math.random() * MAX_UID); // "~~" acts like a faster Math.floor() here
                } while (document.getElementById(prefix));
                return prefix;
            },
            getSelectorFromElement: function getSelectorFromElement(element) {
                var selector = element.getAttribute('data-target');
                if (!selector || selector === '#') {
                    selector = element.getAttribute('href') || '';
                }

                try {
                    var $selector = $(selector);
                    return $selector.length > 0 ? selector : null;
                } catch (error) {
                    return null;
                }
            },
            reflow: function reflow(element) {
                return element.offsetHeight;
            },
            triggerTransitionEnd: function triggerTransitionEnd(element) {
                $(element).trigger(transition.end);
            },
            supportsTransitionEnd: function supportsTransitionEnd() {
                return Boolean(transition);
            },
            typeCheckConfig: function typeCheckConfig(componentName, config, configTypes) {
                for (var property in configTypes) {
                    if (configTypes.hasOwnProperty(property)) {
                        var expectedTypes = configTypes[property];
                        var value = config[property];
                        var valueType = value && isElement(value) ? 'element' : toType(value);

                        if (!new RegExp(expectedTypes).test(valueType)) {
                            throw new Error(componentName.toUpperCase() + ': ' + ('Option "' + property + '" provided type "' + valueType + '" ') + ('but expected type "' + expectedTypes + '".'));
                        }
                    }
                }
            }
        };

        setTransitionEndSupport();

        return Util;
    }(jQuery);

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): alert.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Alert = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'alert';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.alert';
        var EVENT_KEY = '.' + DATA_KEY;
        var DATA_API_KEY = '.data-api';
        var JQUERY_NO_CONFLICT = $.fn[NAME];
        var TRANSITION_DURATION = 150;

        var Selector = {
            DISMISS: '[data-dismiss="alert"]'
        };

        var Event = {
            CLOSE: 'close' + EVENT_KEY,
            CLOSED: 'closed' + EVENT_KEY,
            CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY
        };

        var ClassName = {
            ALERT: 'alert',
            FADE: 'fade',
            SHOW: 'show'

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var Alert = function () {
            function Alert(element) {
                _classCallCheck(this, Alert);

                this._element = element;
            }

            // getters

            // public

            Alert.prototype.close = function close(element) {
                element = element || this._element;

                var rootElement = this._getRootElement(element);
                var customEvent = this._triggerCloseEvent(rootElement);

                if (customEvent.isDefaultPrevented()) {
                    return;
                }

                this._removeElement(rootElement);
            };

            Alert.prototype.dispose = function dispose() {
                $.removeData(this._element, DATA_KEY);
                this._element = null;
            };

            // private

            Alert.prototype._getRootElement = function _getRootElement(element) {
                var selector = Util.getSelectorFromElement(element);
                var parent = false;

                if (selector) {
                    parent = $(selector)[0];
                }

                if (!parent) {
                    parent = $(element).closest('.' + ClassName.ALERT)[0];
                }

                return parent;
            };

            Alert.prototype._triggerCloseEvent = function _triggerCloseEvent(element) {
                var closeEvent = $.Event(Event.CLOSE);

                $(element).trigger(closeEvent);
                return closeEvent;
            };

            Alert.prototype._removeElement = function _removeElement(element) {
                var _this2 = this;

                $(element).removeClass(ClassName.SHOW);

                if (!Util.supportsTransitionEnd() || !$(element).hasClass(ClassName.FADE)) {
                    this._destroyElement(element);
                    return;
                }

                $(element).one(Util.TRANSITION_END, function (event) {
                    return _this2._destroyElement(element, event);
                }).emulateTransitionEnd(TRANSITION_DURATION);
            };

            Alert.prototype._destroyElement = function _destroyElement(element) {
                $(element).detach().trigger(Event.CLOSED).remove();
            };

            // static

            Alert._jQueryInterface = function _jQueryInterface(config) {
                return this.each(function () {
                    var $element = $(this);
                    var data = $element.data(DATA_KEY);

                    if (!data) {
                        data = new Alert(this);
                        $element.data(DATA_KEY, data);
                    }

                    if (config === 'close') {
                        data[config](this);
                    }
                });
            };

            Alert._handleDismiss = function _handleDismiss(alertInstance) {
                return function (event) {
                    if (event) {
                        event.preventDefault();
                    }

                    alertInstance.close(this);
                };
            };

            _createClass(Alert, null, [{
                key: 'VERSION',
                get: function get() {
                    return VERSION;
                }
            }]);

            return Alert;
        }();

        /**
         * ------------------------------------------------------------------------
         * Data Api implementation
         * ------------------------------------------------------------------------
         */

        $(document).on(Event.CLICK_DATA_API, Selector.DISMISS, Alert._handleDismiss(new Alert()));

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = Alert._jQueryInterface;
        $.fn[NAME].Constructor = Alert;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return Alert._jQueryInterface;
        };

        return Alert;
    }(jQuery);

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): button.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Button = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'button';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.button';
        var EVENT_KEY = '.' + DATA_KEY;
        var DATA_API_KEY = '.data-api';
        var JQUERY_NO_CONFLICT = $.fn[NAME];

        var ClassName = {
            ACTIVE: 'active',
            BUTTON: 'btn',
            FOCUS: 'focus'
        };

        var Selector = {
            DATA_TOGGLE_CARROT: '[data-toggle^="button"]',
            DATA_TOGGLE: '[data-toggle="buttons"]',
            INPUT: 'input',
            ACTIVE: '.active',
            BUTTON: '.btn'
        };

        var Event = {
            CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY,
            FOCUS_BLUR_DATA_API: 'focus' + EVENT_KEY + DATA_API_KEY + ' ' + ('blur' + EVENT_KEY + DATA_API_KEY)

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var Button = function () {
            function Button(element) {
                _classCallCheck(this, Button);

                this._element = element;
            }

            // getters

            // public

            Button.prototype.toggle = function toggle() {
                var triggerChangeEvent = true;
                var addAriaPressed = true;
                var rootElement = $(this._element).closest(Selector.DATA_TOGGLE)[0];

                if (rootElement) {
                    var input = $(this._element).find(Selector.INPUT)[0];

                    if (input) {
                        if (input.type === 'radio') {
                            if (input.checked && $(this._element).hasClass(ClassName.ACTIVE)) {
                                triggerChangeEvent = false;
                            } else {
                                var activeElement = $(rootElement).find(Selector.ACTIVE)[0];

                                if (activeElement) {
                                    $(activeElement).removeClass(ClassName.ACTIVE);
                                }
                            }
                        }

                        if (triggerChangeEvent) {
                            if (input.hasAttribute('disabled') || rootElement.hasAttribute('disabled') || input.classList.contains('disabled') || rootElement.classList.contains('disabled')) {
                                return;
                            }
                            input.checked = !$(this._element).hasClass(ClassName.ACTIVE);
                            $(input).trigger('change');
                        }

                        input.focus();
                        addAriaPressed = false;
                    }
                }

                if (addAriaPressed) {
                    this._element.setAttribute('aria-pressed', !$(this._element).hasClass(ClassName.ACTIVE));
                }

                if (triggerChangeEvent) {
                    $(this._element).toggleClass(ClassName.ACTIVE);
                }
            };

            Button.prototype.dispose = function dispose() {
                $.removeData(this._element, DATA_KEY);
                this._element = null;
            };

            // static

            Button._jQueryInterface = function _jQueryInterface(config) {
                return this.each(function () {
                    var data = $(this).data(DATA_KEY);

                    if (!data) {
                        data = new Button(this);
                        $(this).data(DATA_KEY, data);
                    }

                    if (config === 'toggle') {
                        data[config]();
                    }
                });
            };

            _createClass(Button, null, [{
                key: 'VERSION',
                get: function get() {
                    return VERSION;
                }
            }]);

            return Button;
        }();

        /**
         * ------------------------------------------------------------------------
         * Data Api implementation
         * ------------------------------------------------------------------------
         */

        $(document).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE_CARROT, function (event) {
            event.preventDefault();

            var button = event.target;

            if (!$(button).hasClass(ClassName.BUTTON)) {
                button = $(button).closest(Selector.BUTTON);
            }

            Button._jQueryInterface.call($(button), 'toggle');
        }).on(Event.FOCUS_BLUR_DATA_API, Selector.DATA_TOGGLE_CARROT, function (event) {
            var button = $(event.target).closest(Selector.BUTTON)[0];
            $(button).toggleClass(ClassName.FOCUS, /^focus(in)?$/.test(event.type));
        });

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = Button._jQueryInterface;
        $.fn[NAME].Constructor = Button;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return Button._jQueryInterface;
        };

        return Button;
    }(jQuery);


    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): collapse.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Collapse = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'collapse';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.collapse';
        var EVENT_KEY = '.' + DATA_KEY;
        var DATA_API_KEY = '.data-api';
        var JQUERY_NO_CONFLICT = $.fn[NAME];
        var TRANSITION_DURATION = 600;

        var Default = {
            toggle: true,
            parent: ''
        };

        var DefaultType = {
            toggle: 'boolean',
            parent: 'string'
        };

        var Event = {
            SHOW: 'show' + EVENT_KEY,
            SHOWN: 'shown' + EVENT_KEY,
            HIDE: 'hide' + EVENT_KEY,
            HIDDEN: 'hidden' + EVENT_KEY,
            CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY
        };

        var ClassName = {
            SHOW: 'show',
            COLLAPSE: 'collapse',
            COLLAPSING: 'collapsing',
            COLLAPSED: 'collapsed'
        };

        var Dimension = {
            WIDTH: 'width',
            HEIGHT: 'height'
        };

        var Selector = {
            ACTIVES: '.show, .collapsing',
            DATA_TOGGLE: '[data-toggle="collapse"]'

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var Collapse = function () {
            function Collapse(element, config) {
                _classCallCheck(this, Collapse);

                this._isTransitioning = false;
                this._element = element;
                this._config = this._getConfig(config);
                this._triggerArray = $.makeArray($('[data-toggle="collapse"][href="#' + element.id + '"],' + ('[data-toggle="collapse"][data-target="#' + element.id + '"]')));
                var tabToggles = $(Selector.DATA_TOGGLE);
                for (var i = 0; i < tabToggles.length; i++) {
                    var elem = tabToggles[i];
                    var selector = Util.getSelectorFromElement(elem);
                    if (selector !== null && $(selector).filter(element).length > 0) {
                        this._triggerArray.push(elem);
                    }
                }

                this._parent = this._config.parent ? this._getParent() : null;

                if (!this._config.parent) {
                    this._addAriaAndCollapsedClass(this._element, this._triggerArray);
                }

                if (this._config.toggle) {
                    this.toggle();
                }
            }

            // getters

            // public

            Collapse.prototype.toggle = function toggle() {
                if ($(this._element).hasClass(ClassName.SHOW)) {
                    this.hide();
                } else {
                    this.show();
                }
            };

            Collapse.prototype.show = function show() {
                var _this6 = this;

                if (this._isTransitioning || $(this._element).hasClass(ClassName.SHOW)) {
                    return;
                }

                var actives = void 0;
                var activesData = void 0;

                if (this._parent) {
                    actives = $.makeArray($(this._parent).children().children(Selector.ACTIVES));
                    if (!actives.length) {
                        actives = null;
                    }
                }

                if (actives) {
                    activesData = $(actives).data(DATA_KEY);
                    if (activesData && activesData._isTransitioning) {
                        return;
                    }
                }

                var startEvent = $.Event(Event.SHOW);
                $(this._element).trigger(startEvent);
                if (startEvent.isDefaultPrevented()) {
                    return;
                }

                if (actives) {
                    Collapse._jQueryInterface.call($(actives), 'hide');
                    if (!activesData) {
                        $(actives).data(DATA_KEY, null);
                    }
                }

                var dimension = this._getDimension();

                $(this._element).removeClass(ClassName.COLLAPSE).addClass(ClassName.COLLAPSING);

                this._element.style[dimension] = 0;

                if (this._triggerArray.length) {
                    $(this._triggerArray).removeClass(ClassName.COLLAPSED).attr('aria-expanded', true);
                }

                this.setTransitioning(true);

                var complete = function complete() {
                    $(_this6._element).removeClass(ClassName.COLLAPSING).addClass(ClassName.COLLAPSE).addClass(ClassName.SHOW);

                    _this6._element.style[dimension] = '';

                    _this6.setTransitioning(false);

                    $(_this6._element).trigger(Event.SHOWN);
                };

                if (!Util.supportsTransitionEnd()) {
                    complete();
                    return;
                }

                var capitalizedDimension = dimension[0].toUpperCase() + dimension.slice(1);
                var scrollSize = 'scroll' + capitalizedDimension;

                $(this._element).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);

                this._element.style[dimension] = this._element[scrollSize] + 'px';
            };

            Collapse.prototype.hide = function hide() {
                var _this7 = this;

                if (this._isTransitioning || !$(this._element).hasClass(ClassName.SHOW)) {
                    return;
                }

                var startEvent = $.Event(Event.HIDE);
                $(this._element).trigger(startEvent);
                if (startEvent.isDefaultPrevented()) {
                    return;
                }

                var dimension = this._getDimension();

                this._element.style[dimension] = this._element.getBoundingClientRect()[dimension] + 'px';

                Util.reflow(this._element);

                $(this._element).addClass(ClassName.COLLAPSING).removeClass(ClassName.COLLAPSE).removeClass(ClassName.SHOW);

                if (this._triggerArray.length) {
                    for (var i = 0; i < this._triggerArray.length; i++) {
                        var trigger = this._triggerArray[i];
                        var selector = Util.getSelectorFromElement(trigger);
                        if (selector !== null) {
                            var $elem = $(selector);
                            if (!$elem.hasClass(ClassName.SHOW)) {
                                $(trigger).addClass(ClassName.COLLAPSED).attr('aria-expanded', false);
                            }
                        }
                    }
                }

                this.setTransitioning(true);

                var complete = function complete() {
                    _this7.setTransitioning(false);
                    $(_this7._element).removeClass(ClassName.COLLAPSING).addClass(ClassName.COLLAPSE).trigger(Event.HIDDEN);
                };

                this._element.style[dimension] = '';

                if (!Util.supportsTransitionEnd()) {
                    complete();
                    return;
                }

                $(this._element).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
            };

            Collapse.prototype.setTransitioning = function setTransitioning(isTransitioning) {
                this._isTransitioning = isTransitioning;
            };

            Collapse.prototype.dispose = function dispose() {
                $.removeData(this._element, DATA_KEY);

                this._config = null;
                this._parent = null;
                this._element = null;
                this._triggerArray = null;
                this._isTransitioning = null;
            };

            // private

            Collapse.prototype._getConfig = function _getConfig(config) {
                config = $.extend({}, Default, config);
                config.toggle = Boolean(config.toggle); // coerce string values
                Util.typeCheckConfig(NAME, config, DefaultType);
                return config;
            };

            Collapse.prototype._getDimension = function _getDimension() {
                var hasWidth = $(this._element).hasClass(Dimension.WIDTH);
                return hasWidth ? Dimension.WIDTH : Dimension.HEIGHT;
            };

            Collapse.prototype._getParent = function _getParent() {
                var _this8 = this;

                var parent = $(this._config.parent)[0];
                var selector = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]';

                $(parent).find(selector).each(function (i, element) {
                    _this8._addAriaAndCollapsedClass(Collapse._getTargetFromElement(element), [element]);
                });

                return parent;
            };

            Collapse.prototype._addAriaAndCollapsedClass = function _addAriaAndCollapsedClass(element, triggerArray) {
                if (element) {
                    var isOpen = $(element).hasClass(ClassName.SHOW);

                    if (triggerArray.length) {
                        $(triggerArray).toggleClass(ClassName.COLLAPSED, !isOpen).attr('aria-expanded', isOpen);
                    }
                }
            };

            // static

            Collapse._getTargetFromElement = function _getTargetFromElement(element) {
                var selector = Util.getSelectorFromElement(element);
                return selector ? $(selector)[0] : null;
            };

            Collapse._jQueryInterface = function _jQueryInterface(config) {
                return this.each(function () {
                    var $this = $(this);
                    var data = $this.data(DATA_KEY);
                    var _config = $.extend({}, Default, $this.data(), (typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object' && config);

                    if (!data && _config.toggle && /show|hide/.test(config)) {
                        _config.toggle = false;
                    }

                    if (!data) {
                        data = new Collapse(this, _config);
                        $this.data(DATA_KEY, data);
                    }

                    if (typeof config === 'string') {
                        if (data[config] === undefined) {
                            throw new Error('No method named "' + config + '"');
                        }
                        data[config]();
                    }
                });
            };

            _createClass(Collapse, null, [{
                key: 'VERSION',
                get: function get() {
                    return VERSION;
                }
            }, {
                key: 'Default',
                get: function get() {
                    return Default;
                }
            }]);

            return Collapse;
        }();

        /**
         * ------------------------------------------------------------------------
         * Data Api implementation
         * ------------------------------------------------------------------------
         */

        $(document).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE, function (event) {
            if (!/input|textarea/i.test(event.target.tagName)) {
                event.preventDefault();
            }

            var $trigger = $(this);
            var selector = Util.getSelectorFromElement(this);
            $(selector).each(function () {
                var $target = $(this);
                var data = $target.data(DATA_KEY);
                var config = data ? 'toggle' : $trigger.data();
                Collapse._jQueryInterface.call($target, config);
            });
        });

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = Collapse._jQueryInterface;
        $.fn[NAME].Constructor = Collapse;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return Collapse._jQueryInterface;
        };

        return Collapse;
    }(jQuery);

  /* global Popper */

})();