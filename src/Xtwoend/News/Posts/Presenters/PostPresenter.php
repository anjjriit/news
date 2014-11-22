<?php namespace Xtwoend\News\Posts\Presenters;
    	
/**
 * Part of the package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause)
 * @copyright  (c) 2014 
 */

use Xtwoend\News\Presenters\AbstractPresenter;

class PostPresenter extends AbstractPresenter {	
	
	/**
     * Prepare the data to retreive.
     *
     * @return void
     */
    public function prepareData()
    {
        $this->setAttribute('post_id');
        $this->setAttribute('post_title');
        $this->setAttribute('post_slug');
        $this->setAttribute('post_category', null, 'this category');
    	$this->setAttribute('post_content');

    	$date = explode('-', $this->getModel()->created_at);

    	$this->setAttribute('post_url', null, \URL::to($date[0].'/'.$date[1].'/'.$date[2].'/'.$this->getModel()->post_slug));
    }
	
}