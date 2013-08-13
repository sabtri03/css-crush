<?php
/**
 * Pseudo classes for working with ARIA roles, states and properties.
 *
 * ARIA roles spec: http://www.w3.org/TR/wai-aria/roles
 * ARIA states and properties spec: http://www.w3.org/TR/wai-aria/states_and_properties
 *
 * @before
 *      :role(tablist) {...}
 *      :aria-expanded {...}
 *      :aria-expanded(false) {...}
 *      :aria-label {...}
 *      :aria-label(foobarbaz) {...}
 *
 * @after
 *      [role="tablist"] {...}
 *      [aria-expanded="true"] {...}
 *      [aria-expanded="false"] {...}
 *      [aria-label] {...}
 *      [aria-label="foobarbaz"] {...}
 */
namespace CssCrush;

Plugin::register('aria', array(
    'enable' => function () {
        foreach (aria() as $name => $value) {
            CssCrush::addSelectorAlias($name, $value);
        }
    },
    'disable' => function () {
        foreach (aria() as $name => $value) {
            CssCrush::removeSelectorAlias($name);
        }
    },
));


function aria () {

    static $aria, $optional_value;
    if (! $aria) {
        $optional_value = function ($property) {
            return function ($args) use ($property) {
                return $args ? "[$property=\"#(0)\"]" : "[$property]";
            };
        };
        $aria = array(

            // Roles.
            'role' => '[role="#(0)"]',

            // States and properties.
            'aria-activedescendant' => $optional_value('aria-activedescendant'),
            'aria-atomic' => '[aria-atomic="#(0 true)"]',
            'aria-autocomplete' => $optional_value('aria-autocomplete'),
            'aria-busy' => '[aria-busy="#(0 true)"]',
            'aria-checked' => '[aria-checked="#(0 true)"]',
            'aria-controls' => $optional_value('aria-controls'),
            'aria-describedby' => $optional_value('aria-describedby'),
            'aria-disabled' => '[aria-disabled="#(0 true)"]',
            'aria-dropeffect' => $optional_value('aria-dropeffect'),
            'aria-expanded' => '[aria-expanded="#(0 true)"]',
            'aria-flowto' => $optional_value('aria-flowto'),
            'aria-grabbed' => '[aria-grabbed="#(0 true)"]',
            'aria-haspopup' => '[aria-haspopup="#(0 true)"]',
            'aria-hidden' => '[aria-hidden="#(0 true)"]',
            'aria-invalid' => '[aria-invalid="#(0 true)"]',
            'aria-label' => $optional_value('aria-label'),
            'aria-labelledby' => $optional_value('aria-labelledby'),
            'aria-level' => $optional_value('aria-level'),
            'aria-live' => $optional_value('aria-live'),
            'aria-multiline' => '[aria-multiline="#(0 true)"]',
            'aria-multiselectable' => '[aria-multiselectable="#(0 true)"]',
            'aria-orientation' => $optional_value('aria-orientation'),
            'aria-owns' => $optional_value('aria-owns'),
            'aria-posinset' => $optional_value('aria-posinset'),
            'aria-pressed' => '[aria-pressed="#(0 true)"]',
            'aria-readonly' => '[aria-readonly="#(0 true)"]',
            'aria-relevant' => $optional_value('aria-relevant'),
            'aria-required' => '[aria-required="#(0 true)"]',
            'aria-selected' => '[aria-selected="#(0 true)"]',
            'aria-setsize' => $optional_value('aria-setsize'),
            'aria-sort' => $optional_value('aria-sort'),
            'aria-valuemax' => $optional_value('aria-valuemax'),
            'aria-valuemin' => $optional_value('aria-valuemin'),
            'aria-valuenow' => $optional_value('aria-valuenow'),
            'aria-valuetext' => $optional_value('aria-valuetext'),
        );
    }

    return $aria;
}