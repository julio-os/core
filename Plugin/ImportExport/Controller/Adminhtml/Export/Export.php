<?php
namespace JulioOS\Core\Plugin\ImportExport\Controller\Adminhtml\Export;
use Magento\ImportExport\Controller\Adminhtml\Export\Export as Sb;
use Magento\ImportExport\Model\Export as M;
// 2020-04-02 "A products export leads to the `524` Cloudflare error": https://github.com/julio-os/core/issues/1
final class Export {
	/**
	 * 2020-04-02
	 * @see \Magento\ImportExport\Controller\Adminhtml\Export\Export::execute()
	 * @param Sb $sb
	 */
	function beforeExecute(Sb $sb) {
		if ($sb->getRequest()->getPost(M::FILTER_ELEMENT_GROUP)) {
			// 2020-04-02 https://stackoverflow.com/a/18549349
			header('HTTP/1.0 200 OK', true, 200);
			flush();
		}
	}
}