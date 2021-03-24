<?php

namespace MC\McCookie\Middleware;


use MC\McCookie\Domain\Model\Cookie;
use MC\McCookie\Domain\Repository\CookieRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Http\JsonResponse;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class AjaxSearch implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {


        $language = "de";

        $uidLanguage = 0;

        $response = $handler->handle($request);
        if (!isset($request->getQueryParams()['cookiedata'])) {
            return $response;
        }

        if (isset($request->getQueryParams()['lang'])) {
            $language = $request->getQueryParams()['lang'];
        }

        $uidLanguage = $request->getAttributes()["language"]->getLanguageId();

        $queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable('tx_mccookie_domain_model_cookie');
        $statement = $queryBuilder
            ->select('message', 'text_mehr_informationen', 'button_message', 'pid_data_privacy', "message_youtube", "text_mehr_informationen_youtube", "button_message_youtube", "pid_data_privacy_youtube")
            ->from('tx_mccookie_domain_model_cookie')
            ->where(
                $queryBuilder->expr()->eq('sys_language_uid', $queryBuilder->createNamedParameter($uidLanguage))
            )
            ->andWhere(
                $queryBuilder->expr()->eq('pid', $queryBuilder->createNamedParameter($request->getAttributes()["site"]->getRootPageId()))
            )
            ->execute();

        /** \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($uidLanguage);
         * \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($request->getAttributes()["site"]->getRootPageId());
         * die();**/


        while ($row = $statement->fetch()) {

            $response = [];
            $response["google"] = [];

            $response["google"]["message"] = $row["message"];
            $response["google"]["textMoreInformation"] = $row["text_mehr_informationen"];
            $response["google"]["buttonMessage"] = $row["button_message"];


            if ($row["pid_data_privacy"] != 0 && !is_null($row["pid_data_privacy"])) {
                $site = GeneralUtility::makeInstance(SiteFinder::class)->getSiteByPageId($row["pid_data_privacy"]);

                $uri = (string)$site->getRouter()->generateUri(
                    (int)$row["pid_data_privacy"],
                    array_merge(
                        ['_language' => $uidLanguage]
                    ),
                    '',
                    \TYPO3\CMS\Core\Routing\RouterInterface::ABSOLUTE_URL
                );
            } else {
                $uri = 0;
            }

            $response["google"]["pidDataPrivacy"] = $uri;


            $response["youtube"] = [];
            $response["youtube"]["message"] = $row["message_youtube"];
            $response["youtube"]["textMoreInformation"] = $row["text_mehr_informationen_youtube"];
            $response["youtube"]["buttonMessage"] = $row["button_message_youtube"];

            if ($row["pid_data_privacy_youtube"] != 0 && !is_null($row["pid_data_privacy_youtube"])) {
                $site = GeneralUtility::makeInstance(SiteFinder::class)->getSiteByPageId($row["pid_data_privacy_youtube"]);

                $uri = (string)$site->getRouter()->generateUri(
                    (int)$row["pid_data_privacy_youtube"],
                    array_merge(
                        ['_language' => $uidLanguage]
                    ),
                    '',
                    \TYPO3\CMS\Core\Routing\RouterInterface::ABSOLUTE_URL
                );
            } else {
                $uri = 0;
            }

            $response["youtube"]["pidDataPrivacy"] = $uri;
        }

        unset($cookie);
        unset($uidLanguage);


        return new JsonResponse($response);
    }
}
